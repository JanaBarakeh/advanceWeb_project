<?php
// @author Salah aldin Tanbour

use Illuminate\Support\Facades\Route;


Route::get('tables/available', [\App\Http\Controllers\TableController::class, 'getAvailableTables']);
Route::get('tables/reserved', [\App\Http\Controllers\TableController::class, 'getReservedTables']);
