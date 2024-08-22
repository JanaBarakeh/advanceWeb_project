<?php
// @author Jana Barakeh
namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
 
    protected $model = MenuItem::class;
/**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word . ' Pizza',
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 20), // random price between 5 and 20
            'is_available' => $this->faker->boolean(80), // 80% chance of being true
            'category' => 'Pizza', // fixed category for this example
        ];
    }
}
