<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cardio;
use illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        Cardio ::factory()->count(10)->create(); // Generates 10 fake events
    }
}