<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;


Route::post('reservations', [ReservationController::class, 'reserveTable'])->middleware('auth');
Route::get('user/reservations', [ReservationController::class, 'getUserReservations'])->middleware('auth');

Route::get('reservations', [ReservationController::class, 'getReservations'])
    ->middleware('auth')
    ->can('viewAny', Reservation::class);

Route::delete('reservations/{id}', [ReservationController::class, 'cancelReservation'])
    ->middleware('auth')
    ->can('cancel', 'id');

Route::get('reservations/availability', [ReservationController::class, 'getAvailability']);
