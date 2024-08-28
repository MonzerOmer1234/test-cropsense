<?php

namespace App\Http\Controllers;

use App\Mail\WarningMail;
use App\Models\Light;
use App\Models\SensorRead;
use App\Models\Sensors\Light as SensorsLight;
use App\Models\Sensors\SensorRead as SensorsSensorRead;
use Database\Seeders\SensorReadSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LightController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response .
     */
    public function index()
    {
        //
        $light = SensorsLight::all();
        return response()->json([
            'status' => 'succcess',
            'message' => 'The lights are fetched successfully',
            'light' => $light,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param SensorRead $sensorRead .
     * @return Response .
     */
    public function store(Request $request , SensorsSensorRead $sensorRead)
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
          $light = SensorsLight::create($fields);

          if($sensorRead > $light->max_read){
            Mail::to(Auth::user())->send(new WarningMail());
          }

          return response()->json([
            'status' => 'success',
            'message' => 'The light is created successfully',
            'light' => $light,
          ]);
    }

    /**
     * Display the specified resource.
     * @param Light $light // route model binding
     * @return Response
     */
    public function show(SensorsLight $light)
    {
        //

        return response()->json([
            'message' => 'the specified light is fetched successfully',
            'light' => $light,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param Light $light .
     * @param SensorRead $sensorRead
     * @return Response
     */
    public function update(Request $request, SensorsLight $light , SensorReadSeeder $sensorRead)
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
            $light->update($fields);
            if($sensorRead > $light->max_read){
                Mail::to(Auth::user())->send(new WarningMail());
              }

          return response()->json([
            'status' => 'success',
            'message' => 'The light is updated successfully',
            'light' => $light,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Light $light .
     * @return Response .
     */
    public function destroy(SensorsLight $light)
    {
        //

        $light->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'The light is deleted successfully'

        ]);
    }
}
