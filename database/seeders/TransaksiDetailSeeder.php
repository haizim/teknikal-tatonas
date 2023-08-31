<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksiDetail = [
            [
                'trans_id' => 1,
                'hardware' => 4001,
                'sensor' => 'rf',
                'value' => 0.5
            ],
            [
                'trans_id' => 2,
                'hardware' => 4002,
                'sensor' => 'wl',
                'value' => 701.25
            ],
            [
                'trans_id' => 2,
                'hardware' => 4002,
                'sensor' => 'bt',
                'value' => 12.1
            ],
            [
                'trans_id' => 3,
                'hardware' => 4003,
                'sensor' => 'ah',
                'value' => 27
            ],
            [
                'trans_id' => 3,
                'hardware' => 4003,
                'sensor' => 'ws',
                'value' => 10
            ],
            [
                'trans_id' => 3,
                'hardware' => 4003,
                'sensor' => 'bt',
                'value' => 12.15
            ],
            [
                'trans_id' => 4,
                'hardware' => 4001,
                'sensor' => 'rf',
                'value' => 1.5
            ],
            [
                'trans_id' => 5,
                'hardware' => 4002,
                'sensor' => 'wl',
                'value' => 750.5
            ],
            [
                'trans_id' => 5,
                'hardware' => 4002,
                'sensor' => 'bt',
                'value' => 12.3
            ],
            [
                'trans_id' => 6,
                'hardware' => 4003,
                'sensor' => 'ah',
                'value' => 25
            ],
            [
                'trans_id' => 6,
                'hardware' => 4003,
                'sensor' => 'ws',
                'value' => 8.55
            ],
            [
                'trans_id' => 6,
                'hardware' => 4003,
                'sensor' => 'bt',
                'value' => 12.05
            ],
            [
                'trans_id' => 7,
                'hardware' => 4001,
                'sensor' => 'rf',
                'value' => 0.5
            ],
            [
                'trans_id' => 8,
                'hardware' => 4002,
                'sensor' => 'wl',
                'value' => 550.75
            ],
            [
                'trans_id' => 8,
                'hardware' => 4002,
                'sensor' => 'bt',
                'value' => 12.2
            ],
            [
                'trans_id' => 9,
                'hardware' => 4003,
                'sensor' => 'ah',
                'value' => 25
            ],
            [
                'trans_id' => 9,
                'hardware' => 4003,
                'sensor' => 'ws',
                'value' => 11.3
            ],
            [
                'trans_id' => 9,
                'hardware' => 4003,
                'sensor' => 'bt',
                'value' => 12.23
            ],
        ];

        foreach ($transaksiDetail as $n => $val) {
            DB::table('transaksi_detail')->insert([
                'id' => $n+1,
                'trans_id' => $val['trans_id'],
                'hardware' => $val['hardware'],
                'sensor' => $val['sensor'],
                'value' => $val['value'],
                'deleted_at' => null
            ]);
        }
    }
}
