<?php

namespace App\Http\Controllers;

use App\Mail\WarningMail;
use App\Models\Humidity;
use App\Models\SensorRead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HumidityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response .
     */
    public function index()
    {
        //
        $humidity = Humidity::all();
        return response()->json([
            'status' => 'succcess',
            'message' => 'The humidites are fetched successfully',
            'humidity' => $humidity,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param SensorRead $sensorRead .
     * @return Response .
     */
    public function store(Request $request , SensorRead $sensorRead)
    {
        //
        $fields = $request->validate([
            'last_read' => 'required',
            'farm_id' => 'required',
            'type' => 'required',
            'type_en' => 'required',
            'serial_number' => ['required' , 'unique:sensors'],
            'lat' => 'required',
            'lng' => 'required',
            'is_active' => 'required',
            'type_id' => 'required',
            'min_read' => 'required',
            'max_read' => 'required',
            'ideal_read' => 'required',
            'notifiable' => 'required',
            'readable' => 'required',
            ]);
          $humidity = Humidity::create($fields);

          if($sensorRead > $humidity->max_read){
            Mail::to(Auth::user())->send(new WarningMail());
          }

          return response()->json([
            'status' => 'success',
            'message' => 'The humidity is created successfully',
            'humidity' => $humidity,
          ]);
    }

    /**
     * Display the specified resource.
     * @param Humidity $humidity // route model binding
     * @return Response
     */
    public function show(Humidity $humidity)
    {
        //

        return response()->json([
            'message' => 'the specified humidity is fetched successfully',
            'humidity' => $humidity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param Humidity $humidity .
     * @param SensorRead $sensorRead .
     * @return Response
     */
    public function update(Request $request, Humidity $humidity , SensorRead $sensorRead)
    {
        //

        $fields = $request->validate([
            'last_read' => 'required',
            'farm_id' => 'required',
            'type' => 'required',
            'type_en' => 'required',
            'serial_number' => 'required | exists:sensors',
            'lat' => 'required',
            'lng' => 'required',
            'is_active' => 'required',
            'type_id' => 'required',
            'min_read' => 'required',
            'max_read' => 'required',
            'ideal_read' => 'required',
            'notifiable' => 'required',
            'readable' => 'required',
            ]);
            $humidity->update($fields);
            if($sensorRead > $humidity->max_read){
                Mail::to(Auth::user())->send(new WarningMail());
              }


          return response()->json([
            'status' => 'success',
            'message' => 'The humidity is updated successfully',
            'humidity' => $humidity,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Humidity $humidity .
     * @return Response .
     */
    public function destroy(Humidity $humidity)
    {
        //

        $humidity->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'The humidity is deleted successfully'

        ]);
    }
}
