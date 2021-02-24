<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantOption extends Model
{
    use HasFactory;

    // Because the table name is slightly different
    protected $table = 'applicantOption';

    // All field is can be written by the model req
    protected $guarded = [];
}
