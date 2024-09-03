<?php
// @author Salah aldin Tanbour

use Illuminate\Support\Facades\Route;


Route::get('tables/available', [\App\Http\Controllers\TableController::class, 'getAvailableTables'])
    ->middleware('auth:sanctum')
    ->can('viewAny', \App\Models\Table::class);

Route::get('tables/reserved', [\App\Http\Controllers\TableController::class, 'getReservedTables'])
    ->middleware('auth:sanctum')
    ->can('viewAny', \App\Models\Table::class);
