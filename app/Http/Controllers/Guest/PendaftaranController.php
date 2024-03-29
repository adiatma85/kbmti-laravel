<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\_GuestControllerBase;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

// Model
use App\Models\EventRegister; // This is the model where the applicants store their data
use App\Models\Event; // This is the model for event
use App\Models\EventFieldResponse;

class PendaftaranController extends _GuestControllerBase
{

    private $credentialsFields = ['name', 'nim', 'email'];
    private $arrayedFields = ['organisasi', 'kepanitiaan', 'tahun_organisasi', 'tahun_kepanitiaan'];
    // Rencana arrayed fields akan ditambahi dengan swot

    public function showFromName( $allowedPrefixes, $eventName, Request $request)
    {
        $eventName = str_replace('-', ' ', $eventName);
        $event = Event::where('name', $eventName)
            // ->where('expired_date', '>', Carbon::now())
            ->first();
        if (!$event || $this->notInAllowrdRoutes($allowedPrefixes) ) {
            return $this->generalSwalResponse(
                'Halaman tidak ditemukan',
                'Halaman yang Anda cari tidaklah ada!',
                'error',
                // 404
            );
        }
        $labelName = $event->event_type == 'OPEN-TENDER' ? "Ketua Pelaksana" : "Anggota Kepanitiaan";
        // pendaftaran-kepanitiaan-page inclucing both open-tender and pendaftaran anggota kepanitiaan
        return view('general/pendaftaran/pendaftaran-kepanitiaan-page', compact('event', 'labelName'));
    }

    // Store dari hasil pendaftaran
    public function storePendaftaran( $allowedPrefixes, Request $request)
    {
        $name = str_replace('-', ' ', explode('/', url()->current())[4]);
        $event = Event::where('name', $name)
            ->where(function ($q) {
                $q->where('event_type', 'OPEN-TENDER')
                    ->orWhere('event_type', 'KEPANITIAAN');
            })
            ->first() ?? null;
        if (!$event || $this->notInAllowrdRoutes($allowedPrefixes)) {
            // Masukan gk valid
            return $this->generalSwalResponse(
                'Not Found!',
                'Anda berusaha mencari resource yang tidak ada di dalam sistem!',
                'error',
            );
        }
        $newRegistrationItem = EventRegister::create([
            'event_id' => $event->id
            // For folder, need another time
        ]);
        // Array of responses that needed to created
        // For better approachment, using queue is recomended
        try {
            $queueResponse = [];
            for ($i = 0; $i < count($event->eventFields); $i++) {
                $field = $event->eventFields[$i];
                $fieldName = strtolower($field->name);

                // Better approachment. There are some concern as to why doesn't use switch
                if (in_array($fieldName, $this->credentialsFields)) {
                    $this->handlingCredentialFields($request->$fieldName, $field->id);
                }
                // Arrayed
                if (in_array($fieldName, $this->arrayedFields)) {
                    $items = $request->$fieldName;
                    $itemResponse = $this->handlingArrayedFields($items, $newRegistrationItem->id, $field->id);
                    array_push($queueResponse, $itemResponse);
                    continue;
                }
                // File
                if ($fieldName == 'pemberkasan') {
                    $itemResponse = $this->handlingStoringFiles($request, $newRegistrationItem->id, $field->id);
                    array_push($queueResponse, $itemResponse);
                    continue;
                }

                // DEFAULT
                // Else
                $itemResponse = [
                    'response' => $request->$fieldName,
                    'eventRegistration_id' => $newRegistrationItem->id,
                    'eventField_id' => $field->id
                ];
                array_push($queueResponse, $itemResponse);
            }
            // return response()->json([
            //     'organisasi' => $request->organisasi,
            //     'kepanitiaan' => $request->kepanitiaan,
            //     'tahun_organisasi' => $request->tahun_organisasi,
            //     'tahun_keapnitiaan' => $request->tahun_kepanitiaan,
            //     'queue' => $queueResponse
            // ]);
            $this->queueResolver($queueResponse);
        } catch (\Throwable $th) {
            return $this->generalSwalResponse(
                'Terjadi kesalahan dalam penyimpanan data!',
                'Harap periksa koneksi Anda atau hubungi Administrasi perihal hal ini!',
                'error',
            );
        }
        $newRegistrationItem->save();
        // Emailing the user in here
        // $this->eventEmailResponse($request->email, $event->name, $request->name, $event->bodyText, $event->link);
        return $this->generalSwalResponse(
            'Pendaftaran berhasil!',
            'Terima kasih Anda telah mendaftar!',
            'success',
        );
    }

    public function downloadBerkas($allowed_prefixes, $stringName)
    {
        return response()->download(storage_path('/app/rar/open-tender/' . $stringName));
    }

    public function preStoreItem(Request $request)
    {
        $files = [];
        foreach ($request->files as $file) {
            $filename = Carbon::now() . '.' . $file->extension();
            $file->storeAs('rar/open-tender', $filename);

            $fileObject = EventFieldResponse::create([
                'response' => $filename,
                'eventRegistartion_id' => 0,
                'eventField_id' => 0
            ]);

            // File Objects
            $photo_object = new \stdClass();
            $photo_object->size = round(Storage::size($filename) / 1024, 2);
            $photo_object->fileID = $fileObject->id;
            $files = $fileObject;
        }
        return response()
            ->json([
                'files' => $files
            ]);
    }


    // HELPER FUNCTIONS DEFINED BELOW

    // Checking whether the url is valid or not
    private function notInAllowrdRoutes ($url_segment) {
        $allowed_segment = [
            'open-tender',
            'pendaftaran-kepanitiaan',
            'pendaftaran-event'
        ];
        return !in_array($url_segment, $allowed_segment);
    }


    // Handling the Credentdial Fields as defined in $credentialsFields
    private function handlingCredentialFields($response, $fieldId)
    {
        $isAlreadyExist = EventFieldResponse::where('response', $response)
            ->where('eventField_id', $fieldId)
            ->exists();
        if ($isAlreadyExist) {
            return $this->generalSwalResponse(
                'Terjadi kesalahan dalam penyimpanan data!',
                'Anda telah terdaftar dalam sistem untuk event ini!',
                'error',
            );
        }
    }

    // Handling the Arrayed Fields as defined in $arrayedFields
    private function handlingArrayedFields($items, $newRegistrationItemId, $fieldId)
    {
        for ($j = 0; $j < count($items); $j++) {
            $item = [
                'response' => $items[$j],
                'eventRegistration_id' => $newRegistrationItemId,
                'eventField_id' => $fieldId
            ];
        }
        return $item;
    }

    // Handling Storing Files
    private function handlingStoringFiles($requestItem, $newRegistrationItemId, $fieldId)
    {
        $itemName = Carbon::now() . '.' . $requestItem->pemberkasan->extension();
        $requestItem->pemberkasan->storeAs('rar/open-tender', $itemName);
        $itemResponse = [
            'response' => $itemName,
            'eventRegistration_id' => $newRegistrationItemId,
            'eventField_id' => $fieldId
        ];
        return $itemResponse;
    }

    // Handle the queue in Response
    private function queueResolver($array)
    {
        foreach ($array as $item) {
            EventFieldResponse::create($item)->save();
        }
    }
}
