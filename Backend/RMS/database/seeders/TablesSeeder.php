<?php
// Author: Amjad Kayed

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablesSeeder extends Seeder
{
    public function run()
    {
        DB::table('tables')->insert([
            [
                'details' => 'Table near the window with a view.',
                'is_private' => false,
                'capacity' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'details' => 'Cozy corner table for a quiet dinner.',
                'is_private' => true,
                'capacity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'details' => 'Large table for group gatherings.',
                'is_private' => false,
                'capacity' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'details' => 'Outdoor seating with a canopy.',
                'is_private' => false,
                'capacity' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'details' => 'Table with easy access for families with children.',
                'is_private' => false,
                'capacity' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
