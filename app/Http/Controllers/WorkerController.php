<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workers = User::where('type' , 2)->get();
         return view('workers.index' , ['workers' => $workers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|phone',
            'password' => 'required|min:8|confirmed',


        ]);

        $worker = User::create([
            'name' => $request->name,
            'email' => $request->email ,
            'phone' => $request->phone,
            'password' => $request->password,
            'type' => 2,
            'farm_group_id' => auth()->user()->adminFarmGroup->id,
        ]);
        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $worker = User::findOrFail($id);
        return view('workers.show' , ['worker' => $worker]);
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
