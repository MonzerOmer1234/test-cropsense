<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
        $farms = Farm::all();
        return response()->json([
            'status' => 'success',
            'message' => 'All farms are fetched successfully',
            'farms' => $farms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request.
     * @return Response
     */
    public function store(Request $request)
    {
        //
       $fields =  $request->validate([
       'name' => 'required',
       'location' => 'required',
       'size' => 'required',
       'crop_type' => 'required',
       'description' => 'required',
       'lat' => 'required',
       'long' => 'required',
        'farm_group_id' => 'required',

        ]);

        $farm = Farm::create($fields);
        return response()->json([
            'message' => 'The farm is created successfully',
            'farm' => $farm,
        ]);



    }

    /**
     * Display the specified resource.
     * @param string $id.
     * @return Response
     */
    public function show(string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        // light sensor reads
        $lightSensor = $farm->lightSensors()->latest()->first();
        $lightReads = $lightSensor === null ? [] :  $lightSensor->readings()->select("read")->get();
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
        $temperatureReads = $temperatureSensor === null ? [] :  $temperatureSensor->readings()->select("read")->get();
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
        $humidityReads = $humiditySensor === null ? [] :  $humiditySensor->readings()->select("read")->get();
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
        $tdsReads = $tdsSensor === null ? [] :  $tdsSensor->readings()->select("read")->get();
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
        $soilMoistureReads = $soilMoistureSensor === null ? [] :  $soilMoistureSensor->readings()->select("read")->get();
        $soilMoistureData = [];
        foreach ($soilMoistureReads as $read) {
            array_push($soilMoistureData, +$read->read);
        }

        $soilMoistureReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' , 'Friday' , 'Saturday'],
            'data' => $soilMoistureData,
        ];


        return response()->json([
            'status' => 'success',
            'farm' => $farm ,
            'lightReads' => $lightReads['data'],
            'temperatureReads' => $temperatureReads['data'],
            'humidityReads' => $humidityReads['data'],
             'tdsReads' => $tdsReads['data'] ,
             'soilMoistureReads' => $soilMoistureReads['data']


        ]);



        }


    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request.
     * @param string $id
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        $fields =  $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'crop_type' => 'required',
            'description' => 'required',
             'farm_group_id' => 'required'
             ]);

             $farm->update($fields);

             return response()->json([
                 'message' => 'The farm is updated successfully',
                 'farm' => $farm,
             ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id.
     * @return Response
     */
    public function destroy(string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        $farm->delete();
        return response()->json([
            'message' => 'The farm is deleted successfully',
        ]);
    }
}
