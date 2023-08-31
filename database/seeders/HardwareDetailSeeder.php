<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hardware_detail')->insert([
            'id' => 1,
            'hardware' => 4001,
            'sensor' => 'rf',
            'deleted_at' => null
        ]);

        DB::table('hardware_detail')->insert([
            'id' => 2,
            'hardware' => 4002,
            'sensor' => 'wl',
            'deleted_at' => null
        ]);

        DB::table('hardware_detail')->insert([
            'id' => 3,
            'hardware' => 4002,
            'sensor' => 'bt',
            'deleted_at' => null
        ]);

        DB::table('hardware_detail')->insert([
            'id' => 4,
            'hardware' => 4003,
            'sensor' => 'ah',
            'deleted_at' => null
        ]);

        DB::table('hardware_detail')->insert([
            'id' => 5,
            'hardware' => 4003,
            'sensor' => 'ws',
            'deleted_at' => null
        ]);

        DB::table('hardware_detail')->insert([
            'id' => 6,
            'hardware' => 4003,
            'sensor' => 'bt',
            'deleted_at' => null
        ]);
    }
}
