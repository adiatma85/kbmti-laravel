<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stafAhli as StafAhliModel;
use App\Models\jadwalInterview as JadwalInterviewModel;

class applicantInterviewTime extends Model
{
    use HasFactory;

    // Because the name of table is slightly different
    protected $table = 'applicantInterviewTime';

    // Guarded is zero
    protected $guarded = [];

    public function stafAhli() {
        return $this->belongsTo(StafAhliModel::class, 'staff_id');
    }

    public function jadwalInterview() {
        return $this->belongsTo(JadwalInterviewModel::class, 'jadwal_id',);
    }

    public function testingModel() {
        return "Success";
    }
}
