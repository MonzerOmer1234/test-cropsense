<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //


        $farms = Farm::all();
        return view('farms.index', ['farms' => $farms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'polygon' => 'required',
        ]);
        $farm = Farm::create([
            'farm_group_id' => 1 ,
            'polygon' => json_decode($request->polygon)->geometry->coordinates,
        ]);



        return redirect()->route('farms.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        // light sensor reads
        $lightSensor = $farm->lightSensors()->latest()->first();
        $lightReads = $lightSensor->readings()->select("read")->get();
        $lightData = [];
        foreach ($lightReads as $read) {
            array_push($lightData, +$read->read);
        }

        $lightReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $lightData,
        ];

        // temperature sensor reads
        $temperatureSensor = $farm->temepratureSensors()->latest()->first();
        $temperatureReads = $temperatureSensor->readings()->select("read")->get();
        $temperatureData = [];
        foreach ($temperatureReads as $read) {
            array_push($temperatureData, +$read->read);
        }

        $temperatureReads = [
         'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $temperatureData,
        ];
        // humidity sensor reads
        $humiditySensor = $farm->humiditySensors()->latest()->first();
        $humidityReads = $humiditySensor->readings()->select("read")->get();
        $humidityData = [];
        foreach ($humidityReads as $read) {
            array_push($humidityData, +$read->read);
        }

        $humidityReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $humidityData,
        ];
        // tds sensor reads
        $tdsSensor = $farm->tdsSensors()->latest()->first();
        $tdsReads = $tdsSensor->readings()->select("read")->get();
        $tdsData = [];
        foreach ($tdsReads as $read) {
            array_push($tdsData, +$read->read);
        }

        $tdsReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $tdsData,
        ];
        // soli moisture sensor reads
        $soilMoistureSensor = $farm->moistureSensors()->latest()->first();
        $soilMoistureReads = $soilMoistureSensor->readings()->select("read")->get();
        $soilMoistureData = [];
        foreach ($soilMoistureReads as $read) {
            array_push($soilMoistureData, +$read->read);
        }

        $soilMoistureReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $soilMoistureData,
        ];




        return view('farms.show', ['farm' => $farm, 'lightReads' => $lightReads, 'temperatureReads' => $temperatureReads, 'humidityReads' => $humidityReads, 'tdsReads' => $tdsReads , 'soilMoistureReads' => $soilMoistureReads]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
