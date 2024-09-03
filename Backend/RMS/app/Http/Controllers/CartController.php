<?php
// @author Farah Elhasan
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

        $cartItems = $cartItems->map(function($item) {
            $menuItem = MenuItem::find($item->menu_item_id);
            // Add item name to response.
            $item->name = $menuItem->name;
            return $item;
        });

        return response($cartItems,200);
     }

     public function getallcart(){
        $cart = CartItem::all();
        return response($cart,200);
    }
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $cartItem =CartItem::updateOrCreate(
            [
                'user_id' => $request->user_id,
                'menu_item_id' => $request->menu_item_id,
            ],
            ['quantity' => $request->quantity]
        );
    
        return response($cartItem, 201);
    }

    
public function updateQuantity(Request $request, $id){
    $item = CartItem::find($id);
    if(!$item){
        return response()->json([
            'success'=> false,
            'message' => "item with id= $id not found",
        ], 404);
    }

        $item->quantity = $request->quantity;
        $item->save();
        return response()->json([
            'success'=> true,
            'message' => "item with id= $id quantity updated successfully",
        ], 200);
    
}



public function deleteItem($id){
    $item = CartItem::find($id);
    if(!$item){
        return response()->json([
            'success'=> false,
            'message' => "item with id= $id not found",
        ], 404);
    }

        $item->delete();
        return response()->json([
            'success'=> true,
            'message' => "item with id= $id deleted successfully",
        ], 200);
    
}

}
