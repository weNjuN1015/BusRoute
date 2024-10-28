<?php
// app/Http/Controllers/VehiclePositionController.php

namespace App\Http\Controllers;

use App\Models\VehiclePosition;
use Illuminate\Http\Request;
use App\Events\VehiclePositionUpdated;

class VehiclePositionController extends Controller
{
    public function index($routeId)
    {
        return VehiclePosition::where('route_id', $routeId)->latest()->first();
    }

    public function store(Request $request)
    {
        $position = VehiclePosition::create($request->all());

        broadcast(new VehiclePositionUpdated($position))->toOthers();

        return response()->json($position, 201);
    }
}



