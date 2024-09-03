<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1, 
                'menu_item_id' => 1, 
                'price' => 8.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1, 
                'menu_item_id' => 2, 
                'price' => 9.49,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2, 
                'menu_item_id' => 3, 
                'price' => 7.49,
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3, 
                'menu_item_id' => 4, 
                'price' => 11.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4, 
                'menu_item_id' => 5, 
                'price' => 6.99,
                'quantity' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
