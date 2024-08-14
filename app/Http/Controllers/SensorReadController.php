<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;
use App\Models\SensorRead;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class SensorReadController extends Controller
{
    /**
     * Store a newly created sensor reading in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'sensor_id' => 'required|exists:sensors,id',
            'read' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create new sensor reading
        $sensorRead = SensorRead::create([
            'sensor_id' => $request->sensor_id,
            'read' => $request->read,
        ]);

        // Return a JSON response
        return response()->json([
            'message' => 'Sensor data stored successfully',
            'data' => $sensorRead,
        ], 201);
    }

    /**
     * Display a listing of sensor readings for a specific sensor ID.
     *
     * @param  int  $sensor_id
     * @return \Illuminate\Http\Response
     */
    public function index($sensor_id)
    {
        // Retrieve readings with sensor_id = $sensor_id
        $readings = SensorRead::where('sensor_id', $sensor_id)->get();

        return response()->json($readings);
    }




    //reading Specific Sensor Data ,

    function readSensorDataById(Request $request): Response
    {
        $request->validate([
            'sensor_id' => 'required',
        ]);
        $sensor = Sensor::findOrFail($request->sensor_id);

        if($sensor->readable == 0 || $sensor->readable ==  1){
            return response()->json(['message'=>'not authorized to read data'], 200, );
        }

        $data = [
            'reads'=> $sensor->sensorReads()->latest()->limit(5)->get(),
            'sensor'=> $sensor,
        ];
        return response()->json([$data], 200,);
    }
}
