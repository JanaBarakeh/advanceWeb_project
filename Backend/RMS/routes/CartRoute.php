<?php
// @author Farah Elhasan

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cart/user/{id}', '\App\Http\Controllers\CartController@getCartItems');
