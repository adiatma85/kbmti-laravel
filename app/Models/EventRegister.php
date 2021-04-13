<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Another Model
use App\Models\Event;
use App\Models\EventFieldResponse;

class EventRegister extends Model
{
    use HasFactory;

    // Change the table name for rational reason
    protected $table = 'eventRegistration';

    // Fillable
    protected $fillable = ['name', 'nim', 'email', 'angkatan', 'phone', 'line_id', 'event_id'];

    // Reference to event
    public function toEvent()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // Reference on EventField Response
    public function fieldResponses()
    {
        return $this->hasMany(EventFieldResponse::class, 'eventRegistration_id');
    }

    // Helper Organisasi
    public function getOrganisasiArrayAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('eventFieldResponse', 'eventFieldResponse.eventRegistration_id', '=', 'eventRegistration.id')
            ->join('eventFields', 'eventFieldResponse.eventField_id', '=', 'eventFields.id')
            ->select('eventRegistration.id', 'eventFields.name', 'eventFieldResponse.response')
            ->where(function ($q) {
                $q->where('name', '=', 'Organisasi')
                    ->orWhere('name', '=', 'Tahun_Organisasi');
            })
            ->where('eventRegistration.id', '=', $eventRegistrationId)
            ->get();
        return $query;
    }

    // Helper Kepanitiaan
    public function getKepanitiaanArrayAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('eventFieldResponse', 'eventFieldResponse.eventRegistration_id', '=', 'eventRegistration.id')
            ->join('eventFields', 'eventFieldResponse.eventField_id', '=', 'eventFields.id')
            ->select('eventRegistration.id', 'eventFields.name', 'eventFieldResponse.response')
            ->where(function ($q) {
                $q->where('name', '=', 'Kepanitiaan')
                    ->orWhere('name', '=', 'Tahun_Kepanitiaan');
            })
            ->where('eventRegistration.id', '=', $eventRegistrationId)
            ->get();
        return $query;
    }

    // Helper pemberkasan
    public function getPemberkasanAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('eventFieldResponse', 'eventFieldResponse.eventRegistration_id', '=', 'eventRegistration.id')
            ->join('eventFields', 'eventFieldResponse.eventField_id', '=', 'eventFields.id')
            ->select('eventRegistration.id', 'eventFields.name', 'eventFieldResponse.response')
            ->where('name', '=', 'Pemberkasan')
            ->where('eventRegistration.id', '=', $eventRegistrationId)
            ->get();
        return $query[0];
    }
}
