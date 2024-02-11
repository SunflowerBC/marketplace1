<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query();
        $user->create([
           "name" => "Admin",
           "email" => "admin@example.com",
           "password" => bcrypt("password1")
       ]);
        $user->create([
            "name" => "Moderator",
            "email" => "moderator@example.com",
            "password" => bcrypt("password2")
        ]);
        $user->create([
            "name" => "User",
            "email" => "user@example.com",
            "password" => bcrypt("password3")
        ]);
    }
}
