<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;
use App\Models\Activity;

class AssignActivitiesSeeder extends Seeder
{
    public function run()
    {
        $trainer = Trainer::find(1); // Replace 1 with the trainer's ID
        $activity = Activity::find(1); // Replace 1 with the activity's ID

        $trainer->activities()->attach($activity->id);
    }
}