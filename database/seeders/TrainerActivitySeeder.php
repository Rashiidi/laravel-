<?php
// filepath: database/seeders/TrainerActivitySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;
use App\Models\Activity;

class TrainerActivitySeeder extends Seeder
{
    public function run()
    {
        $trainer = Trainer::find(1); // Replace 1 with the ID of an existing trainer
        $activity = Activity::find(1); // Replace 1 with the ID of an existing activity

        if ($trainer && $activity) {
            $trainer->activities()->attach($activity->id);
        }
    }
}