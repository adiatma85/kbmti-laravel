<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Model
use App\Models\stafAhli as StaffAhliModel;

class stafAhliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [
            // Sabtu
            ['name' => 'Nama 1', 'nim' => '1234567', 'id_line' => 'Ini id line 1', 'no_wa' => '1234567', 'komitmen' => 'Ini komitmen 1'],
            ['name' => 'Nama 2', 'nim' => '2234567', 'id_line' => 'Ini id line 2', 'no_wa' => '2234567', 'komitmen' => 'Ini komitmen 2'],
            ['name' => 'Nama 3', 'nim' => '3234567', 'id_line' => 'Ini id line 3', 'no_wa' => '3234567', 'komitmen' => 'Ini komitmen 3'],
            ['name' => 'Nama 4', 'nim' => '4234567', 'id_line' => 'Ini id line 4', 'no_wa' => '4234567', 'komitmen' => 'Ini komitmen 4'],
            ['name' => 'Nama 5', 'nim' => '5234567', 'id_line' => 'Ini id line 5', 'no_wa' => '5234567', 'komitmen' => 'Ini komitmen 5'],
            ['name' => 'Nama 6', 'nim' => '6234567', 'id_line' => 'Ini id line 6', 'no_wa' => '6234567', 'komitmen' => 'Ini komitmen 6'],
            ['name' => 'Nama 7', 'nim' => '7234567', 'id_line' => 'Ini id line 7', 'no_wa' => '7234567', 'komitmen' => 'Ini komitmen 7'],
            ['name' => 'Nama 8', 'nim' => '8234567', 'id_line' => 'Ini id line 8', 'no_wa' => '8234567', 'komitmen' => 'Ini komitmen 8'],
        ];

        foreach ($dataArray as $jadwal) {
            StaffAhliModel::create($jadwal)->save();
        }
    }
}
