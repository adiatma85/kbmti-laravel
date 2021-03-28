<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\_GuestControllerBase;
use Illuminate\Http\Request;

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

    public function storeEventRegistration(Request $request)
    {
        $isAlreadyExist = EventRegister::where('nim', $request->nim)->exists();
        if ($isAlreadyExist) {
            return $this->generalSwalResponse(
                'Terjadi kesalahan dalam penyimpanan data!',
                'Anda telah terdaftar dalam sistem untuk event ini!',
                'error',
                // 409
            );
        }
        $name = str_replace('-', ' ', explode('/', url()->current())[4]);
        $event = Event::where('name', $name)->first() ?? null;
        if (!$event) {
            // Masukan gk valid
        }
        // else
        $newRegistrationItem = EventRegister::create([
            'name' => $request->name ?? '',
            'nim' => $request->nim ?? '',
            'angkatan' => $request->angkatan ?? '',
            'email' => $request->email ?? '',
            'phone' => $request->phone ?? '',
            'line_id' => $request->line_id ?? '',
            'event_id' => $event->id
            // For folder, need another time
        ]);
        for ($i = 0; $i < count($event->eventFields); $i++) {
            $field = $event->eventFields[$i];
            $fieldName = strtolower($field->name);
            EventFieldResponse::create([
                'response' => $request->$fieldName,
                'eventRegistration_id' => $newRegistrationItem->id,
                'eventField_id' => $field->id
            ])->save();
        }
        $newRegistrationItem->save();
        // Maybe need a function to mailing the user?
        return $this->generalSwalResponse(
            'Pendaftaran berhasil!',
            'Terima kasih Anda telah mendaftar!',
            'success',
        );
    }
}
