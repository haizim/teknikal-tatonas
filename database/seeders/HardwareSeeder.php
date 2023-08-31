<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = '2022-11-10 16:20';
        $createdBy = 'admin';

        DB::table('hardware')->insert([
            'hardware' => 4001,
            'location' => 'ST. JOMBANG',
            'timezone' => 7,
            'local_time' => $time,
            'latitude' => -3.709444,
            'longitude' => 115.40361,
            'created_by' => $createdBy,
            'created_at' => $time,
            'deleted_at' => null
        ]);

        DB::table('hardware')->insert([
            'hardware' => 4002,
            'location' => 'ST. TIMBURU',
            'timezone' => 7,
            'local_time' => $time,
            'latitude' => -2.552639,
            'longitude' => 115.964806,
            'created_by' => $createdBy,
            'created_at' => $time,
            'deleted_at' => null
        ]);

        DB::table('hardware')->insert([
            'hardware' => 4003,
            'location' => 'ST. RIAM ADUNGAN',
            'timezone' => 7,
            'local_time' => $time,
            'latitude' => -3.738917,
            'longitude' => 115.198417,
            'created_by' => $createdBy,
            'created_at' => $time,
            'deleted_at' => null
        ]);
    }
}
