<?php

namespace App\Http\Controllers;

use App\Http\Requests\HardwareDetailRequest;
use App\Models\Hardware;
use App\Models\HardwareDetail;
use App\Models\MasterSensor;
use Illuminate\Http\Request;

class HardwareDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = HardwareDetail::whereNull('deleted_at')
            ->with(['sensors', 'hardwares'])
            ->get();
        return view('hardware-detail.index', compact(['details']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = [
            'hardware' => old('hardware') ?? '',
            'sensor' => old('sensor') ?? '',
        ];

        $hardwares = Hardware::whereNull('deleted_at')->get();
        $sensors = MasterSensor::whereNull('deleted_at')->orderBy('sensor')->get();

        return view('hardware-detail.create', compact(['detail', 'hardwares', 'sensors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HardwareDetailRequest $request)
    {
        $detail = HardwareDetail::where('sensor', $request->sensor)->where('hardware', $request->hardware);

        if ($detail->count() > 0) {
            return redirect()->back()->withInput()
                ->withError("Hardware '$request->hardware' dengan Sensor '$request->sensor' sudah ada");
        }

        HardwareDetail::create($request->validated());

        return redirect()->route('hardware-detail.index')->withSuccess('Hardware Detail berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = HardwareDetail::find($id);
        return view('hardware-detail.show', compact(['detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = HardwareDetail::find($id);
        
        $hardwares = Hardware::whereNull('deleted_at')->get();
        $sensors = MasterSensor::whereNull('deleted_at')->orderBy('sensor')->get();

        return view('hardware-detail.edit', compact(['detail', 'hardwares', 'sensors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HardwareDetailRequest $request, $id)
    {
        $detailCheck = HardwareDetail::where('sensor', $request->sensor)
            ->where('hardware', $request->hardware)
            ->where('id', '!=', $id);

        if ($detailCheck->count() > 0) {
            return redirect()->back()->withInput()
                ->withError("Hardware '$request->hardware' dengan Sensor '$request->sensor' sudah ada");
        }

        $detail = HardwareDetail::find($id);
        $detail->update($request->validated());

        return redirect()->route('hardware-detail.index')->withSuccess('Hardware Detail berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = HardwareDetail::where('id', $id);
        if (auth()->user()->hasRole(['Admin'])) {
            $detail->update(['deleted_at' => date("Y-m-d H:i:s")]);
        } elseif (auth()->user()->hasRole(['Super Admin'])) {
            $detail->delete();
        }
        
        return redirect()->route('hardware-detail.index')->withSuccess('Hardware Detail berhasil dihapus');
    }
}
