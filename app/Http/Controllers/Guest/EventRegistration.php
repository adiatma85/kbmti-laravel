<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\_GuestControllerBase;
use Illuminate\Http\Request;
use App\Http\Requests\Guest\EventRegistration\StoreEventRegistration as Store;

// Model
use App\Models\EventRegister; // This is the model where the applicants store their data
use App\Models\Event; // This is the model for event
use App\Models\EventFieldResponse;

class EventRegistration extends _GuestControllerBase
{
    public function index()
    {
        return view('general/event-registration/index-page');
    }

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
        return view('general/event-registration/variable-page', compact('event'));
    }

    public function storeEventRegistration(Store $request)
    {
        $name = str_replace('-', ' ', explode('/', url()->current())[4]);
        $event = Event::where('name', $name)->first() ?? null;
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
        for ($i = 0; $i < count($event->eventFields); $i++) {
            $field = $event->eventFields[$i];
            $fieldName = strtolower($field->name);
            if ($fieldName == 'name' || $fieldName == 'nim' || $fieldName == 'email') {
                $isAlreadyExist = EventFieldResponse::where('response', $request->$fieldName)
                    ->where('eventField_id', $field->id)
                    ->exists();
                if ($isAlreadyExist) {
                    return $this->generalSwalResponse(
                        'Terjadi kesalahan dalam penyimpanan data!',
                        'Anda telah terdaftar dalam sistem untuk event ini!',
                        'error',
                    );
                }
            }
            // Else
            EventFieldResponse::create([
                'response' => $request->$fieldName,
                'eventRegistration_id' => $newRegistrationItem->id,
                'eventField_id' => $field->id
            ])->save();
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
}
