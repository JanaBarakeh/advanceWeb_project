<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CartController extends Controller
{
      /**
     * @OA\Get(   
     *     path="/api/orders/{id}/items",  
     *     summary="Retrieve order items",  
     *     description="Returns all items for a specific order",  
     *     tags={"Orders"},   
     *     @OA\Parameter(   
     *         name="id",   
     *         in="path",   
     *         required=true,   
     *         @OA\Schema(   
     *             type="integer"
     *         ),
     *         description="The ID of the order to retrieve items for"
     *     ),
     *     @OA\Response(   
     *         response=200,   
     *         description="Successful operation",   
     *         @OA\JsonContent(   
     *             type="array",   
     *              @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="menu_item_id", type="integer", example=1),
     *                 @OA\Property(property="price", type="number", format="float", example=19.99),
     *                 @OA\Property(property="quantity", type="integer", example=2)
     *               )          
     *         )
     *     ),
     *      @OA\Response(
     *         response=404,
     *         description="Reservation not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Order with id=1 not found")
     *         )
     *     )
     * )
     */
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
