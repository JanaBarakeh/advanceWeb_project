<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/order', '\App\Http\Controllers\userController@getUser');