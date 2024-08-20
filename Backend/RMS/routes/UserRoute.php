<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users', "\App\Http\Controllers\UserController@GetAllUsers");
Route::get('/user/{id}', "\App\Http\Controllers\UserController@getUserById");
Route::post('/user',"\App\Http\Controllers\UserController@CreateUser");
Route::post('/add-role',"\App\Http\Controllers\RoleController@CraeteRole");
Route::post("/login","\App\Http\Controllers\RoleController@CraeteRole");


// Route::post('/register', [AuthController::class, 'Register']);
// Route::post('/login', [AuthController::class, 'login']);