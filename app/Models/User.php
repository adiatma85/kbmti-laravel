<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAdminIdAttribute($value)
    {
        switch ($value) {
            case 0:
                return 'Kahim';
                break;

            case 1:
                return 'Wakahim';
                break;

            case 2:
                return 'Internal';
                break;

            case 3:
                return 'Sekretaris';
                break;

            case 4:
                return 'Bendahara';
                break;

            case 5:
                return 'Human Resource Development';
                break;

            case 6:
                return 'Advocacy';
                break;

            case 7:
                return 'Social Environment';
                break;

            case 8:
                return 'Entrepreneurship';
                break;

            case 9:
                return 'Relation and Creative';
                break;

            case 10:
                return 'Administrative';
                break;

            case 11:
                return 'Master Admon';
                break;
                
            default:
                return 'Guest';
                break;
        }
    }
}
