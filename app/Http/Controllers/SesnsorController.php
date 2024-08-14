<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SesnsorController extends Controller
{

    function singleFarmReading(Farm $farm)
    {
        $data = [
            $farm->tdsSensors()->with(['readings' => function ($q) {
                $q->whereDate('created_at', Carbon::today())->limit(10)->get();
            }])->get(),
            $farm->lightSensors()->with(['readings' => function ($q) {
                $q->whereDate('created_at', Carbon::today())->limit(10)->get();
            }])->get(),
            $farm->temepratureSensors()->with(['readings' => function ($q) {
                $q->whereDate('created_at', Carbon::today())->limit(10)->get();
            }])->get(),
            $farm->moistureSensors()->with(['readings' => function ($q) {
                $q->whereDate('created_at', Carbon::today())->limit(10)->get();
            }])->get(),
            $farm->humiditySensors()->with(['readings' => function ($q) {
                $q->whereDate('created_at', Carbon::today())->limit(10)->get();
            }])->get(),
        ];

        return response()->json($data, 200,);
    }
}
