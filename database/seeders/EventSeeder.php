<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()->count(10)->create(); // Generates 10 fake events
    }
}