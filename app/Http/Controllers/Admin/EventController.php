<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\_AdminControllerBase;
use Illuminate\Http\Request;

/* model */
use App\Models\Event;
use App\Models\EventRegistrationTypes as EventField;
use Symfony\Component\VarDumper\VarDumper;

class EventController extends _AdminControllerBase
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('Admin/Events/index-event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Events/create-event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create($request->only([
            'name',
            'description',
            'bodyText',
            'event_type',
            'bodyText',
            'link'
        ]));

        if ($request->field) {
            foreach ($request->field as $field) {
                switch ($field) {
                    case 'email':
                        $fieldTypes = 'email';
                        break;
    
                    case 'Angkatan':
                        $fieldTypes = 'dropdown';
                        break;
    
                    case 'Nomor Telepon':
                        $fieldTypes = 'number';
                        break;
    
                    default:
                        $fieldTypes = 'text';
                        break;
                }
                EventField::create([
                    'name' => str_replace(' ', '_', $field),
                    'type' => $fieldTypes,
                    'event_id' => $event->id
                ])->save();
            }
        }

        if ($request->fieldTypes && $request->fieldNames) {
            for ($i = 0; $i < count($request->fieldTypes); $i++) {
                EventField::create([
                    'name' => str_replace(' ', '_', $request->fieldNames[$i]),
                    'type' => $request->fieldTypes[$i],
                    'event_id' => $event->id
                ])->save();
            }
        }
        // Khusus Open Tender Dan Kepanitiaan
        if ($request->event_type == 'OPEN-TENDER' || $request->event_type == 'KEPANITIAAN') {

            EventField::create([
                'name' => 'Tahun_Organisasi',
                'type' => 'text',
                'event_id' => $event->id
            ])->save();

            EventField::create([
                'name' => 'Tahun_Kepanitiaan',
                'type' => 'text',
                'event_id' => $event->id
            ])->save();

            EventField::create([
                'name' => 'Inovasi',
                'type' => 'textarea',
                'event_id' => $event->id
            ])->save();

            EventField::create([
                'name' => 'Pemberkasan',
                'type' => 'text',
                'event_id' => $event->id
            ])->save();

            // Khusus Kepanitiaan
            if ($request->event_type == 'KEPANITIAAN') {
                EventField::create([
                    'name' => 'Swot',
                    'type' => 'textarea',
                    'event_id' => $event->id
                ])->save();
            }
        }
        $event->save();

        return $this->generalSwalResponse(
            'Penambahan Event telah berhasil!',
        );
    }

    /**
     * Display the specified resource.
     * Dalam hal ini menunjukkan siapa saja pendaftarnya!
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        if ($event->event_type == 'OPEN-TENDER') {
            return view('Admin/Events/detail-open-tender', compact('event'));
        }
        return view('Admin/Events/detail-event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('Admin/Events/edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->save();
        return $this->generalSwalResponse(
            'Pengeditan pendaftaran event berhasil dilakukan!',
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id', $id)->delete();
        return $this->generalSwalResponse(
            'Penghapusan pendafatarn event berhasil dilakukan!',
        );
    }
}
