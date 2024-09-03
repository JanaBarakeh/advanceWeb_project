<?php
// @author Jana Barakeh
namespace Database\Seeders;

use App\Models\MenuItem;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::Factory()->create();
        DB::table('menu_items')->insert([
            [
                'name' => 'Classic Chicken Burger',
                'description' => 'Juicy chicken patty, toasted bun, lettuce, tomato, mayonnaise.',
                'price' => 8.99,
                'is_available' => true,
                'category' => 'Burger',
                'image_path' => 'images/menu_items/classic_chicken_burger.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cheeseburger',
                'description' => 'Beef patty, melted cheddar cheese, lettuce, tomato, pickles, ketchup, and mustard.',
                'price' => 9.49,
                'is_available' => false,
                'category' => 'Burger',
                'image_path' => 'images/menu_items/cheeseburger.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vegetarian Wrap',
                'description' => 'Grilled vegetables, hummus, and mixed greens wrapped in a tortilla.',
                'price' => 7.49,
                'is_available' => true,
                'category' => 'Wraps',
                'image_path' => 'images/menu_items/vegetarian_wrap.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BBQ Chicken Pizza',
                'description' => 'Chicken, BBQ sauce, red onions, cilantro, and mozzarella cheese on a crispy crust.',
                'price' => 11.99,
                'is_available' => true,
                'category' => 'Pizza',
                'image_path' => 'images/menu_items/bbq_chicken_pizza.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Crisp romaine lettuce, Parmesan cheese, croutons, and Caesar dressing.',
                'price' => 6.99,
                'is_available' => true,
                'category' => 'Salads',
                'image_path' => 'images/menu_items/caesar_salad.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
