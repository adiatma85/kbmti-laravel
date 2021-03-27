<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Another Table
use App\Models\EventRegister;
use App\Models\EventRegistrationTypes as EventRegistrationFieldTypes;

class Event extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = ['name', 'description'];

    // Reference on Fields
    public function eventFields()
    {
        return $this->hasMany(EventRegistrationFieldTypes::class, 'event_id');
    }

    // Reference on EvenRegistration
    public function eventRegistration()
    {
        return $this->hasMany(EventRegister::class, 'event_id');
    }
}
