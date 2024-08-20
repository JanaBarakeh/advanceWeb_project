<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::factory()->create([
            'name'=> 'Pizza Margherita',
            'description'=> 'Traditional Italian pizza with fresh mozzarella, basil, and tomatoes.',
            'price'=> 12.50,
            'is_available'=> true,
            'category'=>'Pizza'
        ]);

    }
}
