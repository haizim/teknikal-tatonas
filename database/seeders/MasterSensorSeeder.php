<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdBy = 'admin';
        $createdAt = '2022-11-10 16:20';
        DB::table('master_sensor')->insert([
            'sensor' => 'rf',
            'sensor_name' => 'Rainfall',
            'unit' => 'mm',
            'created_by' => $createdBy,
            'created_at' => $createdAt,
            'deleted_at' => null
        ]);

        DB::table('master_sensor')->insert([
            'sensor' => 'wl',
            'sensor_name' => 'Water Level',
            'unit' => 'cm',
            'created_by' => $createdBy,
            'created_at' => $createdAt,
            'deleted_at' => null
        ]);

        DB::table('master_sensor')->insert([
            'sensor' => 'ah',
            'sensor_name' => 'Air Humidity',
            'unit' => '%',
            'created_by' => $createdBy,
            'created_at' => $createdAt,
            'deleted_at' => null
        ]);

        DB::table('master_sensor')->insert([
            'sensor' => 'ws',
            'sensor_name' => 'Wind Speed',
            'unit' => 'm/s',
            'created_by' => $createdBy,
            'created_at' => $createdAt,
            'deleted_at' => null
        ]);

        DB::table('master_sensor')->insert([
            'sensor' => 'bt',
            'sensor_name' => 'Battery',
            'unit' => 'Volt',
            'created_by' => $createdBy,
            'created_at' => $createdAt,
            'deleted_at' => null
        ]);
    }
}
