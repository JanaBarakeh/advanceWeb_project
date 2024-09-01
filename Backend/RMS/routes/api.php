<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

require __DIR__.'/TableRoutes.php';
require __DIR__.'/ReservationRoutes.php';
require __DIR__.'/UserRoute.php';
require __DIR__.'/OrderRoute.php';
require __DIR__.'/AdmainItemRoute.php';
require __DIR__.'/CustomerItemRoute.php';
require __DIR__.'/CartRoute.php';

