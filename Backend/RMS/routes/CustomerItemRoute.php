<?php
// @author Jana Barakeh

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::get('/menu-items/{category}', "\App\Http\Controllers\ItemsController@searchitems");