<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;


Route::post('reservations', [ReservationController::class, 'reserveTable'])
    ->middleware('auth:sanctum')
    ->can('reserve', Reservation::class);

Route::get('user/reservations', [ReservationController::class, 'getUserReservations'])->middleware('auth:sanctum');

Route::get('reservations', [ReservationController::class, 'getReservations'])
    ->middleware('auth:sanctum')
    ->can('viewAny', Reservation::class);

Route::delete('reservations/{reservation}', [ReservationController::class, 'cancelReservation'])
    ->missing(function() {
        return response()->json(['message' => 'Reservation not found'], 404);
    })
    ->middleware('auth:sanctum')
    ->can('cancel', 'reservation');

Route::get('reservations/availability', [ReservationController::class, 'getAvailability']);
