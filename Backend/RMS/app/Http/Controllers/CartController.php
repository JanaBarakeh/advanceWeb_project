<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MenuItem;


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

        $cartItems = $cartItems->map(function($item) {
            $menuItem = MenuItem::find($item->menu_item_id);
            // Add item name to response.
            $item->name = $menuItem->name;
            return $item;
        });

        return response($cartItems,200);
     }
}
