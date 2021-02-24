<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalInterview extends Model
{
    use HasFactory;

    // Because the table name is slightly diferent
    protected $table = 'jadwalInterview';

    // Because there is no guarded
    protected $guarded = [];
}
