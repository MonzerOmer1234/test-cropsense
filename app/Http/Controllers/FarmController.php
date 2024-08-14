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
        $farm = Farm::findOrfail($id);
        return response()->json([
            'message' => 'The specified farm is fetched successfully',
            'farm' => $farm,
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
