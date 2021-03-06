<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model
use App\Models\EventRegister as EventRegistration;
use App\Models\EventRegistrationTypes as EventFields;

class EventFieldResponse extends Model
{
    use HasFactory;
    // change the table for rational reason
    protected $table = 'eventFieldResponse';

    // Fillable
    protected $fillable = ['response', 'eventRegistration_id', 'eventField_id'];

    // Reference to eventRegistration
    public function toEventRegistration()
    {
        return $this->belongsTo(EventRegistration::class, 'eventRegistration_id');
    }

    // Reference to eventField
    public function toEventField()
    {
        return $this->belongsTo(EventFields::class, 'eventField_id');
    }
}
