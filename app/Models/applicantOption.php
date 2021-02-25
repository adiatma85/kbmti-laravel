<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stafAhli as StaffAhliModel;

class applicantOption extends Model
{
    use HasFactory;

    // Because the table name is slightly different
    protected $table = 'applicantOption';

    // All field is can be written by the model req
    protected $guarded = [];

    public function stafAhli(){
        return $this->belongsTo(StaffAhliModel::class, 'staff_id');
    }
}
