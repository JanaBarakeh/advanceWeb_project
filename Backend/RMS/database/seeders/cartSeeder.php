<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        DB::table('cart_items')->insert([
            [
                'user_id' => 3,
                'menu_item_id' => 1,
                'price' => 8.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, 
                'menu_item_id' => 2, 
                'price' => 9.49,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, 
                'menu_item_id' => 3, 
                'price' => 7.49,
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6, 
                'menu_item_id' => 4, 
                'price' => 11.99,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6, 
                'menu_item_id' => 5, 
                'price' => 6.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
