<?php
// @author Jana Barakeh

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admain/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::post('/admain/menu-items', '\App\Http\Controllers\ItemsController@creatitems');
Route::put('/admain/menu-items/{id}', '\App\Http\Controllers\ItemsController@updateitems');
Route::delete('/admain/menu-items/{id}', '\App\Http\Controllers\ItemsController@deleteitems');