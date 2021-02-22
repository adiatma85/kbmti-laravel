<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Model
use App\Models\jadwalInterview as JadwalInterviewModel;

class jadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [
            // Jumat
            ['tanggal' => 'Jumat 26 Februari 2021', 'jam' => '19:00'],
            ['tanggal' => 'Jumat 26 Februari 2021', 'jam' => '19:45'],
            ['tanggal' => 'Jumat 26 Februari 2021', 'jam' => '20:15'],
            ['tanggal' => 'Jumat 26 Februari 2021', 'jam' => '21:00'],
            // Sabtu
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '10:00'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '10:45'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '11:30'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '12:45'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '13:30'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '14:15'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '15:00'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '16:00'],
            ['tanggal' => 'Sabtu 27 Februari 2021', 'jam' => '16:45'],
            // Minggu
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '10:00'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '10:45'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '11:30'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '12:45'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '13:30'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '14:15'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '15:00'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '16:00'],
            ['tanggal' => 'Minggu 28 Februari 2021', 'jam' => '16:45'],
        ];

        foreach ($dataArray as $jadwal) {
            # code...
            JadwalInterviewModel::create($jadwal)->save();
        }
    }
}
