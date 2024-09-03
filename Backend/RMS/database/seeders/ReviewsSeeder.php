<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'reservation_id' => 1, 
                'user_id' => 3,        
                'rating' => 5,
                'content' => 'Excellent service and delicious food! Highly recommended.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 2, 
                'user_id' => 6,        
                'rating' => 4,
                'content' => 'Great atmosphere and friendly staff. Food was good but a bit pricey.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 3, 
                'user_id' => 3,        
                'rating' => 3,
                'content' => 'The food was okay, but the service was slow. Could be improved.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 4, 
                'user_id' => 6,        
                'rating' => 2,
                'content' => 'Not satisfied with the meal. The food was cold and the service was poor.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => 5, 
                'user_id' => 3,        
                'rating' => 5,
                'content' => 'Fantastic experience! Everything from the food to the ambiance was perfect.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
