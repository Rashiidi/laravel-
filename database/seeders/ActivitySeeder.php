<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        Activity::create([
            'title' => 'Yoga Session',
            'description' => 'A relaxing yoga session for beginners.',
            'location' => 'Fitness Center',
            'date' => '2025-03-20',
        ]);
    }
}