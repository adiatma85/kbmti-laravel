<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stafAhli extends Model
{
    use HasFactory;

    // Because different name of table
    protected $table = 'stafAhliRegistration';

    // All field can be filled
    protected $guarded = [];
}
