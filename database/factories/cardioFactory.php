<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cardio; // Ensure this is imported

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class CardioFactory extends Factory
{
    /**
     * The name of the model that this factory is for.
     *
     * @var string
     */
    protected $model = Cardio::class; 

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'walking' => $this->faker->sentence(7),  
            'full_body_workout' => $this->faker->city(),  
        ];
    }
}