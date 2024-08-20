<?php
// @author Jana Barakeh

namespace App\Http\Controllers;
use App\Models\MenuItem;
use Illuminate\Http\Request;
/**
 * @OA\Info(
 *     title="Menu API",
 *     version="1.0.0",
 *     description="API documentation for the Menu Item management system."
 * )
 */
class ItemsController extends Controller
{
  
/**
 * @OA\Get(
 *     path="api/admain/menu-items",
 *     tags={"Menu Items"},
 *     summary="Get list of menu items",
 *     description="Returns all menu items",
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="name", type="string"),
 *                 @OA\Property(property="description", type="string"),
 *                 @OA\Property(property="price", type="number", format="float"),
 *                 @OA\Property(property="category", type="string"),
 *                 @OA\Property(property="is_available", type="boolean")
 *             )
 *         )
 *     )
 * )
 */
    public function getItems(){
        $items = MenuItem::all();
        return response($items);
    }
 /**
 * @OA\Post(
 *     path="api/admain/menu-items",
 *     tags={"Menu Items"},
 *     summary="Create a new menu item",
 *     description="Creates a new menu item",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             required={"name", "price", "category","is_available"},
 *             @OA\Property(property="name", type="string", example="Spaghetti Carbonara"),
 *             @OA\Property(property="description", type="string", example="Classic Italian pasta with eggs, cheese, pancetta, and pepper."),
 *             @OA\Property(property="price", type="number", format="float", example=14.50),
 *             @OA\Property(property="category", type="string", example="Pasta"),
 *             @OA\Property(property="is_available", type="boolean", example=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Item created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Spaghetti Carbonara"),
 *             @OA\Property(property="description", type="string", example="Classic Italian pasta with eggs, cheese, pancetta, and pepper."),
 *             @OA\Property(property="price", type="number", format="float", example=14.50),
 *             @OA\Property(property="category", type="string", example="Pasta"),
 *             @OA\Property(property="is_available", type="boolean", example=true)
 *         )
 *     )
 * )
 */
    public function creatitems(Request $request)
    {
         // Validate request data
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'category' => 'required|string|max:255',
        ]);

        // Create a new menu item
        $menuItem = MenuItem::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'is_available' => $validatedData['is_available'] ?? true,
            'category' => $validatedData['category'],
        ]);

        // Return a response or redirect
        return response($menuItem);
    }
/**
 * @OA\Put(
 *     path="api/admain/menu-items/{id}",
 *     tags={"Menu Items"},
 *     summary="Update a menu item",
 *     description="Updates an existing menu item",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the menu item to update"
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", example="Spaghetti Carbonara"),
 *             @OA\Property(property="description", type="string", example="Classic Italian pasta with eggs, cheese, pancetta, and pepper."),
 *             @OA\Property(property="price", type="number", format="float", example=14.50),
 *             @OA\Property(property="category", type="string", example="Pasta"),
 *             @OA\Property(property="is_available", type="boolean", example=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Item updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Spaghetti Carbonara"),
 *             @OA\Property(property="description", type="string", example="Classic Italian pasta with eggs, cheese, pancetta, and pepper."),
 *             @OA\Property(property="price", type="number", format="float", example=14.50),
 *             @OA\Property(property="category", type="string", example="Pasta"),
 *             @OA\Property(property="is_available", type="boolean", example=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Item not found"
 *     )
 * )
 */
    public function updateitems(Request $request, $id){
        // Find the menu item by ID
        $menuItem = MenuItem::findOrFail($id);
 
       $validatedData = $request->validate([
      'name' => 'sometimes|required|string|max:255',
      'description' => 'nullable|string',
      'price' => 'sometimes|required|numeric|min:0',
      'is_available' => 'boolean',
      'category' => 'sometimes|required|string|max:255',
       ]);

     $menuItem->update($validatedData);

       return response($menuItem);
    }
/**
 * @OA\Delete(
 *     path="api/admain/menu-items/{id}",
 *     tags={"Menu Items"},
 *     summary="Delete a menu item",
 *     description="Deletes a menu item by its ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the menu item to delete"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Item deleted successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Item deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Item not found"
 *     )
 * )
 */
    public function deleteitems($id){
     
        $menuItem = MenuItem::findOrFail($id);

        $menuItem->delete();
       
        return response("item with id : $id deleted");
    }
/**
 * @OA\Get(
 *     path="api/customr/menu-items/{category}",
 *     tags={"Menu Items"},
 *     summary="Get menu items by category",
 *     description="Returns a list of menu items based on the category",
 *     @OA\Parameter(
 *         name="category",
 *         in="path",
 *         required=true,
 *         description="Category of the menu items"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Spaghetti Carbonara"),
 *                 @OA\Property(property="description", type="string", example="Classic Italian pasta with eggs, cheese, pancetta, and pepper."),
 *                 @OA\Property(property="price", type="number", format="float", example=14.50),
 *                 @OA\Property(property="category", type="string", example="Pasta"),
 *                 @OA\Property(property="is_available", type="boolean", example=true)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Category not found"
 *     )
 * )
 */
    public function searchitems($category){
        $menuItem = MenuItem::where('category', $category)->get();

        if ($menuItem->isEmpty()) {
            return response('No items found in this category.');
        }

        return response($menuItem);
    }

    
}