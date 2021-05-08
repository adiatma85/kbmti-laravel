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

class OpenTenderController extends _GuestControllerBase
{

    private $credentialsFields = ['name', 'nim', 'email'];
    private $arrayedFields = ['organisasi', 'kepanitiaan', 'tahun_organisasi', 'tahun_kepanitiaan'];


    public function showFromName($name)
    {
        $name = str_replace('-', ' ', $name);
        $event = Event::where('name', $name)->first();
        if (!$event) {
            return $this->generalSwalResponse(
                'Halaman tidak ditemukan',
                'Halaman yang Anda cari tidaklah ada!',
                'error',
                // 404
            );
        }
        $labelName = $event->event_type == 'OPEN-TENDER' ? "Ketua Pelaksana" : "Anggota Kepanitiaan";
        return view('general/event-registration/open-tender-page', compact('event', 'labelName'));
    }


    public function storeOpenTenderRegistration(Request $request)
    {
        $name = str_replace('-', ' ', explode('/', url()->current())[4]);
        $event = Event::where('name', $name)
            ->where('event_type', 'OPEN-TENDER')
            ->orWhere('event_type', 'KEPANITIAAN')
            ->first() ?? null;
        if (!$event) {
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
        for ($i = 0; $i < count($event->eventFields); $i++) {
            // try {
            $field = $event->eventFields[$i];
            $fieldName = strtolower($field->name);

            // Better approachment. There are some concern as to why doesn't use switch
            if (in_array($fieldName, $this->credentialsFields)) {
                $this->handlingCredentialFields($request->$fieldName, $field->id);
            }
            // Arrayed
            if (in_array($fieldName, $this->arrayedFields)) {
                $items = $request->$fieldName;
                $this->handlingArrayedFields($items, $newRegistrationItem->id, $field->id);
                continue;
            }
            // File
            if ($fieldName == 'pemberkasan') {
                $this->handlingStoringFiles($request, $newRegistrationItem->id, $field->id);
                // QUICK FIX -> Bug nya di sini boi
                continue;
            }

            // DEFAULT
            // Else
            EventFieldResponse::create([
                'response' => $request->$fieldName,
                'eventRegistration_id' => $newRegistrationItem->id,
                'eventField_id' => $field->id
            ])->save();
            // } catch (\Throwable $th) {
            //     return $this->generalSwalResponse(
            //         'Terjadi kesalahan dalam penyimpanan data!',
            //         'Harap periksa koneksi Anda atau hubungi Administrasi perihal hal ini!',
            //         'error',
            //     );
            // }
        }
        // $newRegistrationItem->save();
        // Emailing the user in here
        // $this->eventEmailResponse($request->email, $event->name, $request->name, $event->bodyText, $event->link);
        return $this->generalSwalResponse(
            'Pendaftaran berhasil!',
            'Terima kasih Anda telah mendaftar!',
            'success',
        );
    }

    public function downloadBerkas($stringName)
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

    private function handlingArrayedFields($items, $newRegistrationItemId, $fieldId)
    {
        for ($j = 0; $j < count($items); $j++) {
            EventFieldResponse::create([
                'response' => $items[$j],
                'eventRegistration_id' => $newRegistrationItemId,
                'eventField_id' => $fieldId
            ])->save();
            // $item = [
            //     'response' => $items[$j],
            //     'eventRegistration_id' => $newRegistrationItemId,
            //     'eventField_id' => $fieldId
            // ];

        }
    }

    // Handling Storing Files
    private function handlingStoringFiles($requestItem, $newRegistrationItemId, $fieldId)
    {
        $imageName = Carbon::now() . '.' . $requestItem->pemberkasan->extension();
        $requestItem->pemberkasan->storeAs('rar/open-tender', $imageName);

        EventFieldResponse::create([
            'response' => $imageName,
            'eventRegistration_id' => $newRegistrationItemId,
            'eventField_id' => $fieldId
        ])->save();

        // EventFieldResponse::whereIn('id', explode(",", $requestItem->file_ids))
        //     ->update([
        //             'eventRegistration_id' => $newRegistrationItemId,
        //             'eventField_id' => $fieldId
        //     ]);
        return;
    }
}
