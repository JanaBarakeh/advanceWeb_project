<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\MenuItem;
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

     public function getallcart(){
        $cart = CartItem::all();
        return response($cart,200);
    }
   public function addToCartItem($id)
{
    // Find the menu item by ID
    $menuItem = MenuItem::find($id);

    // Check if the item exists
    if (!$menuItem) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    // Retrieve the existing cart item from the database
    $cartItem = CartItem::where('menu_item_id', $id)->first();

    if ($cartItem) {
        // If it exists, increment the quantity
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // If it doesn't exist, create a new cart item
        $cartItem = new CartItem();
        $cartItem->menu_item_id = $menuItem->id;
        $cartItem->quantity = 1;
        $cartItem->price = $menuItem->price;
        $cartItem->save();
    }

    // Return the updated cart item in a JSON response
    return response()->json(['message' => 'Item added to cart', 'cartItem' => $cartItem], 200);
}
}
