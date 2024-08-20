<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
use App\Http\Controllers\UserController;

Route::get('/users', "\App\Http\Controllers\UserController@GetAllUsers");
Route::get('/users/{id}', "\App\Http\Controllers\UserController@getUserById");
Route::post('/users',"\App\Http\Controllers\UserController@CreateUser");
Route::put('/users/{id}', "\App\Http\Controllers\UserController@UpdateUser");
Route::delete('/users/{id}',"\App\Http\Controllers\UserController@DeleteUser");


// Route::post('/user',"\App\Http\Controllers\UserController@CreateUser");
// Route::get('/users', "\App\Http\Controllers\UserController@GetAllUsers");
// Route::get('/user/{id}', "\App\Http\Controllers\UserController@getUserById");

// Route::post('/add-role',"\App\Http\Controllers\RoleController@CraeteRole");
// Route::get('/users-with-roles',"\App\Http\Controllers\UserController@GetRoleUser");

// Route::post("/login","\App\Http\Controllers\RoleController@CraeteRole");


// Route::post('/register', [AuthController::class, 'Register']);
// Route::post('/login', [AuthController::class, 'login']); 