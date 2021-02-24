<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// User Model
use App\Models\User;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ketua Himpunan',
            'email' => 'emailKahim@gmail.com',
            'password' => Hash::make('passwordKahim'),
            'adminId' => 0
        ]);

        User::create([
            'name' => 'Wakil Ketua Himpunan',
            'email' => 'emailWakahim@gmail.com',
            'password' => Hash::make('passwordWakahim'),
            'adminId' => 1
        ]);

        User::create([
            'name' => 'Internal',
            'email' => 'emailInternal@gmail.com',
            'password' => Hash::make('passwordInternal'),
            'adminId' => 2
        ]);

        User::create([
            'name' => 'Sekretaris',
            'email' => 'emailSekretaris@gmail.com',
            'password' => Hash::make('passwordSekretaris'),
            'adminId' => 3
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'emailBendahara@gmail.com',
            'password' => Hash::make('passwordBendahara'),
            'adminId' => 4
        ]);

        User::create([
            'name' => 'Human Resource Development',
            'email' => 'emailHrd@gmail.com',
            'password' => Hash::make('passwordHrd'),
            'adminId' => 5
        ]);

        User::create([
            'name' => 'Advocacy',
            'email' => 'emailAdvocacym@gmail.com',
            'password' => Hash::make('passwordAdvocacy'),
            'adminId' => 6
        ]);

        User::create([
            'name' => 'Social Environment',
            'email' => 'emailSocialeEnvironment@gmail.com',
            'password' => Hash::make('passwordWakahim'),
            'adminId' => 7
        ]);

        User::create([
            'name' => 'Entrepreneurship',
            'email' => 'emailEntrepreneurship@gmail.com',
            'password' => Hash::make('passwordEntrepreneurhip'),
            'adminId' => 8
        ]);

        User::create([
            'name' => 'Relation and Creative',
            'email' => 'emailRnC@gmail.com',
            'password' => Hash::make('passwordRnC'),
            'adminId' => 9
        ]);

        User::create([
            'name' => 'Administrative',
            'email' => 'emailAdministrative@gmail.com',
            'password' => Hash::make('passwordAdministrative'),
            'adminId' => 10
        ]);

        User::create([
            'name' => 'Master Admin',
            'email' => 'koernia@gmail.com',
            'password' => Hash::make('koerniaRamdan'),
            'adminId' => 11
        ]);
    }
}
