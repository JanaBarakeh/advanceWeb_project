<?php
// @author Jana Barakeh

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::post('/menu-items', '\App\Http\Controllers\ItemsController@creatitems');
Route::put('/menu-items/{id}', '\App\Http\Controllers\ItemsController@updateitems');
Route::delete('/menu-items/{id}', '\App\Http\Controllers\ItemsController@deleteitems');
Route::patch('/menu-items/{id}/deactivate', '\App\Http\Controllers\ItemsController@deactivateitems');
