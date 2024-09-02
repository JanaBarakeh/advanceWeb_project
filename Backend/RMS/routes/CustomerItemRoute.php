<?php
// @author Jana Barakeh

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/menu-items', "\App\Http\Controllers\ItemsController@getItems");
Route::get('/menu-items/cartall',"\App\Http\Controllers\CartController@getallcart");
Route::get('/menu-items/category/{category}', "\App\Http\Controllers\ItemsController@searchitems");
//add item to cart
Route::post('/menu-items/cart/{id}',"\App\Http\Controllers\CartController@addToCartItem");
