<?php

namespace App\Http\Controllers;

use App\Mail\WarningMail;
use App\Models\SensorRead;
use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response .
     */
    public function index()
    {
        //
        $temperature = Temperature::all();
        return response()->json([
            'status' => 'succcess',
            'message' => 'The temperatures are fetched successfully',
            'temperature' => $temperature,
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
          $temperature = Temperature::create($fields);

          if($sensorRead >  $temperature->max_read){
            Mail::to(Auth::user())->send(new WarningMail());
          }

          return response()->json([
            'status' => 'success',
            'message' => 'The temperature is created successfully',
            'temperature' => $temperature,
          ]);
    }

    /**
     * Display the specified resource.
     * @param Temperature $temperature // route model binding
     * @return Response
     */
    public function show(Temperature $temperature)
    {
        //

        return response()->json([
            'message' => 'the specified temperature is fetched successfully',
            'temperature' => $temperature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param Temperature $temperature .
     * @param SensorRead $sensorRead .
     * @return Response
     */
    public function update(Request $request, Temperature $temperature , SensorRead $sensorRead)
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
            $temperature->update($fields);
            if($sensorRead >  $temperature->max_read){
                Mail::to(Auth::user())->send(new WarningMail());
              }

          return response()->json([
            'status' => 'success',
            'message' => 'The temperature is updated successfully',
            'temperature' => $temperature,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Temperature $temperature .
     * @return Response .
     */
    public function destroy(Temperature $temperature)
    {
        //

        $temperature->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'The temperature is deleted successfully'

        ]);
    }
}
