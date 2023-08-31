<?php

namespace App\Http\Controllers;

use App\Http\Requests\HardwareRequest;
use App\Models\Hardware;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardwares = Hardware::whereNull('deleted_at')->get();
        return view('hardware.index', compact(['hardwares']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hardware = [
            'hardware' => old('hardware') ?? '',
            'location' => old('location') ?? '',
            'timezone' => old('timezone') ?? '',
            'date' => old('date') ?? '',
            'time' => old('time') ?? '',
            'latitude' => old('latitude') ?? '',
            'longitude' => old('longitude') ?? '',
        ];

        return view('hardware.create', compact(['hardware']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HardwareRequest $request)
    {
        $hardware = Hardware::where('hardware', $request->hardware)->whereNull('deleted_at');

        if ($hardware->count() > 0) {
            return redirect()->back()->withInput()->withError("Hardware '$request->hardware' sudah ada");
        }

        $data = array_merge(['local_time' => "$request->date $request->time"], $request->validated());
        Hardware::create($data);

        return redirect()->route('hardware.index')->withSuccess('Hardware berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hardware = Hardware::where('hardware', $id)->first();
        return view('hardware.show', compact(['hardware']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hardware = Hardware::where('hardware', $id)->first();
        $datetime = explode(' ', $hardware->local_time);
        $hardware->date = $datetime[0];
        $hardware->time = $datetime[1];
        
        return view('hardware.edit', compact(['hardware']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HardwareRequest $request, $id)
    {
        $hardwareCheck = Hardware::where('hardware', $request->hardware)->where('hardware', '!=', $id);

        if ($hardwareCheck->count() > 0) {
            return redirect()->back()->withInput()->withError("hardware '$request->hardware' sudah ada");
        }

        $data = array_merge(['local_time' => "$request->date $request->time"], $request->validated());
        unset($data['date']);
        unset($data['time']);
        $hardware = Hardware::where('hardware', $id);
        $hardware->update($data);

        return redirect()->route('hardware.index')->withSuccess('Hardware berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hardware = Hardware::where('hardware', $id);
        if (auth()->user()->hasRole(['Admin'])) {
            $hardware->update(['deleted_at' => date("Y-m-d H:i:s")]);
        } elseif (auth()->user()->hasRole(['Super Admin'])) {
            $hardware->delete();
        }
        
        return redirect()->route('hardware.index')->withSuccess('Hardware berhasil dihapus');
    }
}
