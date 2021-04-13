<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\_GuestControllerBase;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return view('general/event-registration/open-tender-page', compact('event'));
    }


    public function storeOpenTenderRegistration(Request $request)
    {
        $name = str_replace('-', ' ', explode('/', url()->current())[4]);
        $event = Event::where('name', $name)
            ->where('event_type', 'OPEN-TENDER')
            ->first() ?? null;
        if (!$event) {
            // Masukan gk valid
            return $this->generalSwalResponse(
                'Not Found!',
                'Anda berusaha mencari resource yang tidak ada di dalam sistem!',
                'error',
                // 404
            );
        }
        $newRegistrationItem = EventRegister::create([
            'event_id' => $event->id
            // For folder, need another time
        ]);
        // For better approachment, using queue is recomended
        for ($i = 0; $i < count($event->eventFields); $i++) {
            try {
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
                    // $pemberkasanName = Carbon::now() . ' ' . $request->name . '.' . $request->pemberkasan->extension();
                    // $request->pemberkasan->storeAs('rar/open-tender', $pemberkasanName);
                    // EventFieldResponse::create([
                    //     'response' => $pemberkasanName,
                    //     'eventRegistration_id' => $newRegistrationItem->id,
                    //     'eventField_id' => $field->id
                    // ])->save();
                    continue;
                }

                // DEFAULT
                // Else
                EventFieldResponse::create([
                    'response' => $request->$fieldName,
                    'eventRegistration_id' => $newRegistrationItem->id,
                    'eventField_id' => $field->id
                ])->save();
            } catch (\Throwable $th) {
                return $this->generalSwalResponse(
                    'Terjadi kesalahan dalam penyimpanan data!',
                    'Harap periksa koneksi Anda atau hubungi Administrasi perihal hal ini!',
                    'error',
                );
            }
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

    public function downloadBerkas($stringName)
    {
        return response()->download(storage_path('/app/rar/open-tender/'.$stringName));
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
        }
    }

    // Handling Storing Files
    private function handlingStoringFiles($requestItem, $newRegistrationItemId, $fieldId)
    {
        $imageName = Carbon::now() . '.' . $requestItem->pemberkasan->extension();
        $requestItem->storeAs('rar/open-tender', $imageName);

        EventFieldResponse::create([
            'response' => $imageName,
            'eventRegistration_id' => $newRegistrationItemId,
            'eventField_id' => $fieldId
        ])->save();
        return;
    }
}
