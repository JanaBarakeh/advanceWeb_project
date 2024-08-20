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
        // User::factory(10)->create();
        Role::factory()->create([
            'name' => 'Staff',
        ]);
        
        User::factory()->create([
            'name' => 'Lemara Ali',
            'first_name'=> 'lemara',
            'last_name'=> 'Ali',
            'email' => 'Lemarafuad@example.com',
            'password'=> bcrypt('1234'),
            'role_id'=> '1',
        ]);
    }
}
