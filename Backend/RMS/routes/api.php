<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// for admains
Route::get('/admain/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::post('/admain/menu-items', '\App\Http\Controllers\ItemsController@creatitems');
Route::put('/admain/menu-items/{id}', '\App\Http\Controllers\ItemsController@updateitems');
Route::delete('/admain/menu-items/{id}', '\App\Http\Controllers\ItemsController@deleteitems');
//for customors
Route::get('/customr/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::get('/customr/menu-items/{category}', "\App\Http\Controllers\ItemsController@searchitems");
//for both





