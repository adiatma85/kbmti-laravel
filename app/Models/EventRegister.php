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
}
