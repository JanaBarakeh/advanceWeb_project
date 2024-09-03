<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'reservation_id' => 1,
                'total_price' => 45.00,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 2,
                'total_price' => 32.50,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 3,
                'total_price' => 60.00,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 4,
                'total_price' => 22.75,
                'status' => 'canceled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 5,
                'total_price' => 80.00,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
