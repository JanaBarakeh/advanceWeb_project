<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
use App\Http\Controllers\UserController;

///admin
Route::get('/users', "\App\Http\Controllers\UserController@GetAllUsers");
Route::get('/users/{id}', "\App\Http\Controllers\UserController@getUserById");
Route::post('/users',"\App\Http\Controllers\UserController@CreateUser");
Route::put('/users/{id}', "\App\Http\Controllers\UserController@UpdateUser");
Route::delete('/users/{id}',"\App\Http\Controllers\UserController@DeleteUser");
///////////
Route::post("/roles","\App\Http\Controllers\RoleController@CraeteRole");
///////////
Route::post("/register","\App\Http\Controllers\AuthController@register");
Route::post("/login","\App\Http\Controllers\AuthController@login");
// Route::post("/logout","\App\Http\Controllers\AuthController@logout");


Route::middleware('auth:sanctum')->post("/logout", "\App\Http\Controllers\AuthController@logout");