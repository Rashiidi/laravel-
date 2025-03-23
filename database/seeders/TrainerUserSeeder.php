<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class TrainerUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Trainer User',
            'email' => 'trainer@example.com',
            'password' => bcrypt('password'), // Use a secure password
            'role' => 'trainer', // Assign the trainer role
        ]);
    }
}
