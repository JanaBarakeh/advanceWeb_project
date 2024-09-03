<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class ReservationsSeeder extends Seeder
{
    public function run()
    {
        // status:
        // 0- pending
        // 1- completed
        // 2- canceled
        DB::table('reservations')->insert([
            [
                'table_id' => 1,
                'user_id' => 3,  
                'date' => '2024-09-10',
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'actual_end_time' => '20:50:00',
                'status' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_id' => 2,
                'user_id' => 6,  
                'date' => '2024-09-11',
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'actual_end_time' => '12:55:00',
                'status' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_id' => 3,
                'user_id' => 3,  
                'date' => '2024-09-12',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'actual_end_time' => null, 
                'status' => 0, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_id' => 4,
                'user_id' => 6,  
                'date' => '2024-09-13',
                'start_time' => '20:00:00',
                'end_time' => '22:00:00',
                'actual_end_time' => null, 
                'status' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_id' => 5,
                'user_id' => 3,  
                'date' => '2024-09-14',
                'start_time' => '14:00:00',
                'end_time' => '15:30:00',
                'actual_end_time' => '15:25:00',
                'status' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
