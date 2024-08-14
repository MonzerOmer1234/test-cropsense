<?php

namespace App\Http\Controllers;

use App\Mail\WarningMail;
use App\Models\SensorRead;
use App\Models\SoilMoisture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SoilMoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response .
     */
    public function index()
    {
        //
        $soilMoisture = SoilMoisture::all();
        return response()->json([
            'status' => 'succcess',
            'message' => 'The soil Moistures are fetched successfully',
            'soilMoisture' => $soilMoisture,
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
          $soilMoisture = SoilMoisture::create($fields);


          if($sensorRead > $soilMoisture->max_read){
            Mail::to(Auth::user())->send(new WarningMail());
          }

          return response()->json([
            'status' => 'success',
            'message' => 'The soil Moisture is created successfully',
            'soilMoisture' => $soilMoisture,
          ]);
    }

    /**
     * Display the specified resource.
     * @param SoilMoisture $soilMoisture // route model binding
     * @return Response
     */
    public function show(SoilMoisture $soilMoisture)
    {
        //

        return response()->json([
            'message' => 'the specified soil Moisture is fetched successfully',
            'soilMoisture' => $soilMoisture,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param SoilMoisture $soilMoisture .
     * @param SensorRead $sensorRead
     * @return Response
     */
    public function update(Request $request, SoilMoisture $soilMoisture , SensorRead $sensorRead)
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
            $soilMoisture->update($fields);
            if($sensorRead > $soilMoisture->max_read){
                Mail::to(Auth::user())->send(new WarningMail());
              }

          return response()->json([
            'status' => 'success',
            'message' => 'The soil Moisture is updated successfully',
            'soilMoisture' => $soilMoisture,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param SoilMoisture $soilMoisture .
     * @return Response .
     */
    public function destroy(SoilMoisture $soilMoisture)
    {
        //

        $soilMoisture->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'The soil Moisture is deleted successfully'

        ]);
    }
}
