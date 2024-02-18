<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionExercice>
 */
class SessionExerciceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'programme_id' => Programme::factory(), // Crée un nouveau Programme pour chaque SessionExercice ou utilisez Programme::inRandomOrder()->first()->id pour une référence existante
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'duree' => $this->faker->numberBetween(1, 60),
        ];
    }
}
