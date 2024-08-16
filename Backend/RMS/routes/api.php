<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/usertry', "\App\Http\Controllers\usercontroller@getUser");
Route::get('/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::post('/menu-items', '\App\Http\Controllers\ItemsController@creatitems');





