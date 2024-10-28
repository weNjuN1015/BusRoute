<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routecontroller;
use App\Http\Controllers\VehiclePositionController;


Route::get('/', function () {
    return view('welcome');
});
// routes/api.php
Route::get('routes', [RouteController::class, 'index']);
Route::get('vehicle-positions/{routeId}', [VehiclePositionController::class, 'index']);
Route::post('vehicle-positions', [VehiclePositionController::class, 'store']);

