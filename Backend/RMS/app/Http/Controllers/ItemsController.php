<?php
// @author Jana Barakeh

namespace App\Http\Controllers;
use App\Models\MenuItem;
use Illuminate\Http\Request;
class ItemsController extends Controller
{
  
/**
 * @OA\Get(
 *     path="/api/menu-items",
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
        return response($items,200);
    }

    public function getItembyid($id){
        $menuItem = MenuItem::findOrFail($id);
        return response( $menuItem,200);
    }
 /**
 * @OA\Post(
 *     path="/api/menu-items",
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
 *         response=200,
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

         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
            'category' => 'required|string|max:255',
        ]);

        $menuItem = MenuItem::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'is_available' => $validatedData['is_available'] ?? true,
            'category' => $validatedData['category'],
        ]);

        return response($menuItem,200);
    }
/**
 * @OA\Put(
 *     path="/api/menu-items/{id}",
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
 *         description="invalid Menu_item id"
 *     )
 * )
 */
    public function updateitems(Request $request, $id){

        $menuItem = MenuItem::findOrFail($id);

        if(!$menuItem)
        {
            return response("invalid Menu_item id",404);
        }

 
         $validatedData = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'sometimes|required|numeric|min:0',
        'is_available' => 'sometimes|required|boolean',
        'category' => 'sometimes|required|string|max:255',
         ]);

       $menuItem->update($validatedData);

       return response($menuItem,200);
    }
/**
 * @OA\Delete(
 *     path="/api/menu-items/{id}",
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
 *             @OA\Property(property="message", type="string", example="item with id : 1 deleted")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="invalid Menu_item id"
 *     )
 * )
 */
    public function deleteitems($id){
     
        $menuItem = MenuItem::findOrFail($id);

        if(!$menuItem)
        {
            return response("invalid Menu_item id",404);
        }

        $menuItem->delete();
       
        return response("item with id : $id deleted",200);
    }
/**
 * @OA\Get(
 *     path="/api/menu-items/{category}",
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

        return response($menuItem,200);
    }
    /**
 * @OA\Patch(
 *     path="/menu-items/{id}/deactivate",
 *     tags={"Menu Items"},
 *     summary="Deactivate a Menu Item",
 *     description="Allows admin users to deactivate a specific menu item by setting its is_available field to false.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the menu item to deactivate",
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Menu item deactivated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="item with id : 1 deactive")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Menu item not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="invalid Menu_item id")
 *         )
 *     ),
 * )
 */
    public function deactivateitems($id){
       $menuItem=MenuItem::findOrFail($id);
       if(!$menuItem)
       {
           return response("invalid Menu_item id",404);
       }
       $menuItem->is_available=false;
       $menuItem->save();
       return response("item with id : $id deactive",200);
    }

}
