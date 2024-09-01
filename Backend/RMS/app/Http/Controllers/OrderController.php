<?php
// @author Farah Elhasan
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Reservation;


class OrderController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/orders",
     *     summary="Create a new order",
     *     description="This API allows customers to create a new order by submitting selected ‘MenuItemsIds’ with ‘NEW’ status.",
     *     tags={"Orders"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="reservation_id", type="integer", example=1, description="ID of the reservation"),
     *             @OA\Property(property="total_price", type="number", format="float", example=100.50, description="Total price of the order"),
     *             @OA\Property(property="status", type="string", example="NEW", description="Status of the order"),
     *             @OA\Property(
     *                 property="order_items",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="menu_item_id", type="integer", example=1, description="ID of the menu item"),
     *                     @OA\Property(property="price", type="number", format="float", example=25.50, description="Price of the menu item"),
     *                     @OA\Property(property="quantity", type="integer", example=2, description="Quantity of the menu item")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Order created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *  *          @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Order created successfully"),
     *             @OA\Property(
     *                 property="order",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="reservation_id", type="integer", example=1),
     *                 @OA\Property(property="total_price", type="number", format="float", example=100.50),
     *                 @OA\Property(property="status", type="string", example="NEW"),
     *                 @OA\Property(
     *                     property="order_items",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(property="menu_item_id", type="integer", example=1),
     *                         @OA\Property(property="price", type="number", format="float", example=25.50),
     *                         @OA\Property(property="quantity", type="integer", example=2)
     *                     )
     *                 )
     *             )
     *         )    
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function createOrder(Request $request) { 
        $totalPrice = 0;
        // Check data coming from request.
       
        $validatedData = $this->validate($request,[
            'reservation_id' => 'required|integer',
            'order_items' => 'required|array',
            'order_items.*.menu_item_id' => 'required|integer',
            'order_items.*.price' => 'required|numeric',
            'order_items.*.quantity' => 'required|integer',
        ]);
       
        // Calculate total price.
        foreach($validatedData['order_items'] as $item){
           $totalPrice += ($item['price'] * $item['quantity']); 
        }

        // Create new order.
        $order = Order::create([
            'reservation_id' => $validatedData['reservation_id'],
            'total_price' => $totalPrice,
            'status' => 'NEW',
        ]); 

        foreach ($validatedData['order_items'] as $item){
            $order->orderItems()->create($item);
        }

        return response()->json([
            'success'=> true,
            'message' => 'Order created successfully',
            'order' => $order,
        ], 201);
    }


    /**
     * @OA\Delete(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Delete an order",
     *     description="Deletes an order by its ID, if status is not “PREPARING” or “READY”.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the order to delete",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *  *          @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Order with id= 1 deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found",
     *         @OA\JsonContent(
     *             type="object",
     *  *          @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Order  with id=1 not found")
     *         )
     *     ),
     *    @OA\Response(
     *         response=403,
     *         description="Cann't delete order",
     *         @OA\JsonContent(
     *             type="object",
     *  *          @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Order with id= 1 cannot be deleted because it is currently PREPIRING or READY")
     *         )
     *     )
     * )
     */
    public function deleteOrder($id){
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'success'=> false,
                'message' => "Order with id= $id not found",
            ], 404);
        }

        if($order->status == 'NEW'){
            $order->delete();
            return response()->json([
                'success'=> true,
                'message' => "Order with id= $id deleted successfully",
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message' => "Order with id= $id cannot be deleted because it is currently PREPIRING or READY."
            ], 403);
        }
    }
    
    /**
     * @OA\PUT(
     *     path="/api/orders/{id}/status",
     *     tags={"Orders"},
     *     summary="Update the status of an order",
     *     description="This API allows kitchen staff to update the order status “PREPARING”, “READY”, and allows waitstaff to update the order status to “DELIVERED”.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the order to update",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"status"},
     *             @OA\Property(property="status", type="string", example="READY")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order status updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Order status updated successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ststus",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Invalid status in the request body")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Order with id=1 not found")
     *         )
     *     )
     * )
     */
    public function updateOrderStatus(Request $request, $id){
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'success'=> false,
                'message' => "Order with id= $id not found",
            ], 404);
        }

        if($request->status == 'PREPARING' || $request->status == 'READY' || $request->status == 'DELIVERED'){
            $order->status = $request->status;
            $order->save();
            return response()->json([
                'success'=> true,
                'message' => "Order with id= $id status updated successfully",
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message' => "Invalid status in the request body",
            ], 400);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Retrieve all orders",
     *     description="Fetches a list of all orders from the database to staff.",
     *     @OA\Response(
     *         response=200,
     *         description="List of all orders",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="reservation_id", type="integer", example=3),
     *                 @OA\Property(property="total_price", type="number", format="float", example=99.99),
     *                 @OA\Property(property="status", type="string", example="DELIVERED"),
     *                 @OA\Property(
     *                     property="items",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(property="menu_item_id", type="integer", example=1),
     *                         @OA\Property(property="price", type="number", format="float", example=19.99),
     *                         @OA\Property(property="quantity", type="integer", example=2)
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function getAllOrders(){
        // The new orders appear in top.
        $orders = Order::all()->sortDesc()->values()->toArray();
        return response($orders, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/orders/reservation/{id}",
     *     tags={"Orders"},
     *     summary="Retrieve all orders for a specific reservation",
     *     description="Fetches a list of all orders placed by a specific reservation using reservation_id.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the reservation",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of reservation's orders",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="reservation_id", type="integer", example=12345),
     *                 @OA\Property(property="total_price", type="number", format="float", example=99.99),
     *                 @OA\Property(property="status", type="string", example="PREPARING"),
     *                 @OA\Property(
     *                     property="items",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(property="menu_item_id", type="integer", example=1),
     *                         @OA\Property(property="price", type="number", format="float", example=19.99),
     *                         @OA\Property(property="quantity", type="integer", example=2)
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Reservation not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Reservation with id=1 not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function getReservationOrders($id){
       $reservation = Reservation::find($id);
       if(!$reservation){
            return response()->json([
                'success'=> false,
                'message' => "Reservation with id= $id not found",
            ], 404);
       }

       $orders = $reservation->orders()->get();
       return response($orders,200);
    }


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
    public function getOrderItems($id){
        $order = Order::find($id);
        if(!$order){
             return response()->json([
                 'success'=> false,
                 'message' => "order with id= $id not found",
             ], 404);
        }
        
        $orderItems = $order->orderItems()->get();
        return response($orderItems,200);
     }
}
