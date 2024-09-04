<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //   User::factory(1)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TablesSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(OrderItemsSeeder::class);
        $this->call(ReviewsSeeder::class);
    }
    
}
