<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Another Table
use App\Models\EventRegistrationTypes as EventField;

class EventFieldChoice extends Model
{
    use HasFactory;
    
    // Change the name for rational reason
    protected $table = 'eventFieldChoice';

    // Relation to eventField
    public function toEventField(){
        return $this->belongsTo(EventField::class, 'eventField_id');
    }
}
