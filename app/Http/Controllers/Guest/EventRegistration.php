<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\EventRegister; // This is the model where the applicants store their data
use App\Models\Event; // This is the model for event
use App\Models\EventFieldResponse;

class EventRegistration extends Controller
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
            return redirect()
                ->route('guest.landing.page')
                ->with('response', [
                    'type' => 'error',
                    'msg' => 'Halaman yang Anda cari tidaklah ada!'
                ]);
        }
        return view('general/event-registration/variable-page', compact('event'));
    }

    public function storeEventRegistration(Request $request)
    {
        $isAlreadyExist = EventRegister::where('nim', $request->nim)->exists();
        if ($isAlreadyExist) {
            return back()->with([
                'type' => 'error',
                'msg' => 'Mohon maaf Anda telah terdaftar pada sistem.'
            ]);
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
        return back()->with([
            'type' => 'success',
            'msg' => 'Pendaftaran telah sukses dilakukan, harap menunggu konfirmasi dari panitia.'
        ]);
    }
}
