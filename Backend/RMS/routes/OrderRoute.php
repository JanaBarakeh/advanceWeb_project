<?php
// @author Farah Elhasan

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/orders', '\App\Http\Controllers\OrderController@createOrder');
Route::delete('/orders/{id}', '\App\Http\Controllers\OrderController@deleteOrder');
Route::put('/orders/{id}/status', '\App\Http\Controllers\OrderController@updateOrderStatus');
Route::get('/orders', '\App\Http\Controllers\OrderController@getAllOrders');
Route::get('/orders/customers/{id}', '\App\Http\Controllers\OrderController@getCustomerOrders');