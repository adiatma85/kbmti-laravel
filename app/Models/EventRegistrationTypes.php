<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Another Model
use App\Models\Event;
use App\Models\EventFieldChoice as FieldChoices;

class EventRegistrationTypes extends Model
{
    use HasFactory;
    // Change the table name for rational reason
    protected $table = 'eventFields';

    // Reference on Event
    public function toEvent()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // Reference on eventFieldChoice for the dropdwon type
    public function eventFieldChoice()
    {
        return $this->hasMany(FieldChoices::class, 'eventField_id');
    }
}
