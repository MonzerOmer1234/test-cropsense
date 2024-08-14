<?php

namespace App\Http\Controllers;

use App\Mail\WarningMail;
use App\Models\SensorRead;
use App\Models\Tds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TdsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response .
     */
    public function index()
    {
        //
        $td = Tds::all();
        return response()->json([
            'status' => 'succcess',
            'message' => 'The tds are fetched successfully',
            'td' => $td,
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
          $td = Tds::create($fields);

          if($sensorRead >  $td->max_read){
            Mail::to(Auth::user())->send(new WarningMail());

          }
          return response()->json([
            'status' => 'success',
            'message' => 'The td is created successfully',
            'td' => $td,
          ]);
    }

    /**
     * Display the specified resource.
     * @param Tds $td // route model binding
     * @return Response
     */
    public function show(Tds $td)
    {
        //

        return response()->json([
            'message' => 'the specified td is fetched successfully',
            'td' => $td,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request .
     * @param Tds $td .
     * @param SensorRead $sensorRead
     * @return Response
     */
    public function update(Request $request, Tds $td , SensorRead $sensorRead)
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
            $td->update($fields);
            if($sensorRead >  $td->max_read){
                Mail::to(Auth::user())->send(new WarningMail());

              }

          return response()->json([
            'status' => 'success',
            'message' => 'The td is updated successfully',
            'td' => $td,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Tds $td .
     * @return Response .
     */
    public function destroy(Tds $td)
    {
        //

        $td->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'The td is deleted successfully'

        ]);
    }
}
