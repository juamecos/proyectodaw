<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class StoneFactory extends Factory
{
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(200, 200),
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'active' => $this->faker->boolean,
            'abuse' => false,  // Default as false
            'code' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{5}'),
            'distance' => $this->faker->randomFloat(2, 10, 100),  // Dummy distance
            'user_id' => User::inRandomOrder()->first()->id, // This ads the id from an existing user 
            'moderation_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'report_count' => $this->faker->numberBetween(0, 10) // Generates a random number of reporte
        ];
    }
}

