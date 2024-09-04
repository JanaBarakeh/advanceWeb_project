<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create();
        DB::table("users")->insert([
            [
                'name' => 'amjad_kayed',
                'first_name'=> 'Amjad',
                'last_name'=> 'Kayed',
                'email' => 'amjadkayed@example.com',
                'password'=> bcrypt('1234'),
                'role_id'=> '1',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'name' => 'ahmad_kayed',
                'first_name'=> 'Ahmad',
                'last_name'=> 'Kayed',
                'email' => 'ahmadkayed@example.com',
                'password'=> bcrypt('1234'),
                'role_id'=> '3',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'name' => 'ahmad_masri',
                'first_name'=> 'Ahmad',
                'last_name'=> 'Masri',
                'email' => 'ahmadmasri@example.com',
                'password'=> bcrypt('1234'),
                'role_id'=> '2',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'name' => 'mohammad_basil',
                'first_name'=> 'Mohammad',
                'last_name'=> 'Basil',
                'email' => 'mohammadbasil@example.com',
                'password'=> bcrypt('1234'),
                'role_id'=> '2',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'name' => 'ahmad_basil',
                'first_name'=> 'Ahmad',
                'last_name'=> 'Basil',
                'email' => 'ahmadbasil@example.com',
                'password'=> bcrypt('1234'),
                'role_id'=> '3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
