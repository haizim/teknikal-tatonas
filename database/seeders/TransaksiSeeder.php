<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter = '{{isi data dari alat}}';
        
        DB::table('transaksi')->insert([
            'trans_id' => 1,
            'hardware' => 4001,
            'parameter' => $parameter,
            'created_by' => 4001,
            'created_at' => '2022-11-08 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 2,
            'hardware' => 4002,
            'parameter' => $parameter,
            'created_by' => 4002,
            'created_at' => '2022-11-08 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 3,
            'hardware' => 4003,
            'parameter' => $parameter,
            'created_by' => 4003,
            'created_at' => '2022-11-08 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 4,
            'hardware' => 4001,
            'parameter' => $parameter,
            'created_by' => 4001,
            'created_at' => '2022-11-09 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 5,
            'hardware' => 4002,
            'parameter' => $parameter,
            'created_by' => 4002,
            'created_at' => '2022-11-09 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 6,
            'hardware' => 4003,
            'parameter' => $parameter,
            'created_by' => 4003,
            'created_at' => '2022-11-09 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 7,
            'hardware' => 4001,
            'parameter' => $parameter,
            'created_by' => 4001,
            'created_at' => '2022-11-10 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 8,
            'hardware' => 4002,
            'parameter' => $parameter,
            'created_by' => 4002,
            'created_at' => '2022-11-10 16:20',
            'deleted_at' => null
        ]);

        DB::table('transaksi')->insert([
            'trans_id' => 9,
            'hardware' => 4003,
            'parameter' => $parameter,
            'created_by' => 4003,
            'created_at' => '2022-11-10 16:20',
            'deleted_at' => null
        ]);
    }
}
