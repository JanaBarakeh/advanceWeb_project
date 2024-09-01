<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CartController extends Controller
{
    public function getCartItems($id){
        $user = User::find($id);
        if(!$user){
             return response()->json([
                 'success'=> false,
                 'message' => "user with id= $id not found",
             ], 404);
        }
        
        $cartItems = $user->cartItems()->get();
        return response($cartItems,200);
     }
}
