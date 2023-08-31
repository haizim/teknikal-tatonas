<?php

namespace App\Http\Controllers;

use App\Http\Requests\SensorRequest;
use App\Models\MasterSensor;
use Illuminate\Http\Request;

class MasterSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = MasterSensor::whereNull('deleted_at')->get();
        return view('sensor.index', compact(['sensors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sensor = [
            'sensor' => old('sensor') ?? '',
            'sensor_name' => old('sensor_name') ?? '',
            'unit' => old('unit') ?? '',
        ];

        return view('sensor.create', compact(['sensor']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorRequest $request)
    {
        $sensor = MasterSensor::where('sensor', $request->sensor);

        if ($sensor->count() > 0) {
            return redirect()->back()->withInput()->withError("Sensor '$request->sensor' sudah ada");
        }
        MasterSensor::create($request->validated());

        return redirect()->route('sensor.index')->withSuccess('Sensor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = MasterSensor::where('sensor', $id)->first();
        return view('sensor.show', compact(['sensor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = MasterSensor::where('sensor', $id)->first();
        return view('sensor.edit', compact(['sensor']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorRequest $request, $id)
    {
        $sensorCheck = MasterSensor::where('sensor', $request->sensor)->where('sensor', '!=', $id);

        if ($sensorCheck->count() > 0) {
            return redirect()->back()->withInput()->withError("Sensor '$request->sensor' sudah ada");
        }

        $sensor = MasterSensor::where('sensor', $id);
        $sensor->update($request->validated());

        return redirect()->route('sensor.index')->withSuccess('Sensor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = MasterSensor::where('sensor', $id);
        if (auth()->user()->hasRole(['Admin'])) {
            $sensor->update(['deleted_at' => date("Y-m-d H:i:s")]);
        } elseif (auth()->user()->hasRole(['Super Admin'])) {
            $sensor->delete();
        }
        
        return redirect()->route('sensor.index')->withSuccess('Sensor berhasil dihapus');
    }
}
