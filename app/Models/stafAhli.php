<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\applicantInterviewTime as ApplicantInverviewTime;
use App\Models\applicantOption as ApplicantOptionModel;

class stafAhli extends Model
{
    use HasFactory;

    // Because different name of table
    protected $table = 'stafAhliRegistration';

    // All field can be filled
    protected $guarded = [];

    public function applicantInterviewTime()
    {
        return $this->hasMany(ApplicantInverviewTime::class, 'staff_id');
    }


    public function applicantOption()
    {
        return $this->hasMany(ApplicantOptionModel::class, 'staff_id');
    }
}
