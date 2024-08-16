<?php

namespace App\Http\Controllers;
use App\Models\Menu_item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    // get all items 
    public function getItems(){
        $items = Menu_item::all();
        return response($items);
    }

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
        $menuItem = Menu_item::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'is_available' => $validatedData['is_available'] ?? true,
            'category' => $validatedData['category'],
        ]);

        // Return a response or redirect
        return response($menuItem);
    }
    
}
