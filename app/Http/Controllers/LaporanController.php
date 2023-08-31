<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Hardware;
use App\Models\MasterSensor;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    private function getData($request)
    {
        $hardwares = Hardware::whereNull('deleted_at')->get();
        $transaksi = $tables = $chart = $sensors = $datasets = $labels = [];
        $max = $min = null;

        if (
            isset($request['date_from'])
            && isset($request['date_end'])
            && isset($request['hardware'])
        ) {
            $transaksi = Transaksi::where('created_at', '>=', $request['date_from'] . " 00:00")
                ->where('created_at', '<=', $request['date_end'] . " 23:59:59")
                ->where('hardware', $request['hardware'])
                ->with(['hardwares', 'transaksiDetail'])
                ->orderBy('created_at', 'asc')
                ->get();

            $table = [];
            $max = 0;
            $min = 9999999999999999999999;
            
            foreach ($transaksi as $key => $value) {
                $created = $value->created_at->format('Y-m-d H:i:s');
                $table[$created]['local_time'] = $created;

                $maxNow = $value->transaksiDetail()->max('transaksi_detail.value');
                $max = $maxNow > $max ? $maxNow : $max;

                $minNow = $value->transaksiDetail()->min('transaksi_detail.value');
                $min = $minNow < $min ? $minNow : $min;

                foreach ($value->transaksiDetail as $i => $item) {
                    $table[$created][$item->sensor] = $item->value;
                }
            }

            $tables = array_values($table);
            $sensors = MasterSensor::whereIn('sensor', array_keys($tables[0]))->get();

            foreach ($tables as $t => $table) {
                $labels[] = $table['local_time'];
                foreach ($sensors as $s => $sensor) {
                    $label = "$sensor->sensor_name ($sensor->unit)";
                    $chart[$label][] = $table[$sensor->sensor];
                }
            }

            foreach ($chart as $key => $value) {
                $datasets[] = [
                    'label' => $key,
                    'data' => $value
                ];
            }
        }

        $dataset = json_encode($datasets);
        $label = json_encode($labels);

        return [
            'hardwares' => $hardwares,
            'transaksi' => $transaksi,
            'tables' => $tables,
            'sensors' => $sensors,
            'max' => $max,
            'min' => $min,
            'dataset' => $dataset,
            'label' => $label
        ];
    }

    public function index(Request $request)
    {
        $data = $this->getData($request);

        $hardwares = $data['hardwares'];
        $transaksi = $data['transaksi'];
        $tables = $data['tables'];
        $sensors = $data['sensors'];
        $max = $data['max'];
        $min = $data['min'];
        $dataset = $data['dataset'];
        $label = $data['label'];

        return view('laporan.index',
            compact(['hardwares', 'request', 'transaksi', 'tables', 'sensors', 'max', 'min', 'dataset', 'label']));
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getData($request);
                
        $transaksi = $data['transaksi'];
        $tables = $data['tables'];
        $sensors = $data['sensors'];
        $max = $data['max'];
        $min = $data['min'];

        $pdf = Pdf::loadview('laporan.export',
            [
                'transaksi'=>$transaksi,
                'max'=>$max,
                'min'=>$min,
                'sensors'=>$sensors,
                'tables'=>$tables,
                'request'=>$request,
            ]
        )->setPaper('A4', 'landscape');
        
        return $pdf->download('Laporan');
    }

    public function exportExcel(Request $request)
    {
        $data = $this->getData($request);
        $data = array_merge(['request' => $request], $data);

        return Excel::download(new LaporanExport($data), "Laporan.xlsx");
    }
}
