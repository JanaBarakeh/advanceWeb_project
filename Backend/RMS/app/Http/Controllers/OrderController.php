<?php
// @author Farah Elhasan
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;



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
        // Check data coming from request.
        $validatedData = $request->validate([
            'reservation_id' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'order_items' => 'required|array',
            'order_items.*.menu_item_id' => 'required|integer',
            'order_items.*.price' => 'required|numeric',
            'order_items.*.quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'reservation_id' => $validatedData['reservation_id'],
            'total_price' => $validatedData['total_price'],
            'status' => $validatedData['status'],
        ]);

        foreach ($validatedData['order_items'] as $item){
            $order->orderItems()->create($item);
        }

        return response()->json([
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
     *             @OA\Property(property="message", type="string", example="Order deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Order not found")
     *         )
     *     )
     * )
     */
    public function deleteOrder($id){
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
     *         description="Invalid input",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Invalid input")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Order not found")
     *         )
     *     )
     * )
     */
    public function updateOrderStatus(Request $request, $id){
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

    }

    /**
     * @OA\Get(
     *     path="/orders/customers/{id}",
     *     tags={"Orders"},
     *     summary="Retrieve all orders for a specific customer",
     *     description="Fetches a list of all orders placed by a specific customer using their ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the customer",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of customer's orders",
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
     *         description="Customer not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Customer not found")
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
    public function getCustomerOrders($id){

    }




}
