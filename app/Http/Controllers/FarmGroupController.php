<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $farmGroups =  FarmGroup::all();
        return response()->json([
         'message' => 'All groups are fetched successfully',
         'farmGroups' => $farmGroups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //





    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $farmGroup = FarmGroup::findOrFail($id);

        return response()->json([
            'message' => 'the group is fetched successfully',
            'farmGroup' => $farmGroup,
        ]);
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
        $farmGroup = FarmGroup::findOrfail($id);

        $farmGroup->delete();
    }
}
