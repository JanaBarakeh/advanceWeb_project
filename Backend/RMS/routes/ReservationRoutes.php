<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::post('reservations', [ReservationController::class, 'reserveTable']);
Route::get('user/reservations', [ReservationController::class, 'getUserReservations']);
Route::get('reservations', [ReservationController::class, 'getReservations']);
Route::delete('reservations/{id}', [ReservationController::class, 'cancelReservation']);
Route::get('reservations/availability', [ReservationController::class, 'getAvailability']);
