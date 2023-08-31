<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    private $datas = 0;

    public function __construct($data)
    {
        $this->datas = $data;
    }

    public function view(): View
    {
        $data = $this->datas;

        $transaksi = $data['transaksi'];
        $tables = $data['tables'];
        $sensors = $data['sensors'];
        $max = $data['max'];
        $min = $data['min'];
        $request = $data['request'];

        return view('laporan.export', [
                'transaksi'=>$transaksi,
                'max'=>$max,
                'min'=>$min,
                'sensors'=>$sensors,
                'tables'=>$tables,
                'request'=>$request,
            ]);
    }
}
