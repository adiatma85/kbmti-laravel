<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantInterviewTime extends Model
{
    use HasFactory;

    // Because the name of table is slightly different
    protected $table = 'applicantInterviewTime';

    // Guarded is zero
    protected $guarded = [];
}
