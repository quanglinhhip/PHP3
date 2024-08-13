<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_title' => fake()->text(50),
            'cover_art' => fake()->imageUrl(320, 240),
            'developer' => fake()->company(),
            'release_year' => fake()->year(),
            'genre' => fake()->randomElement(['Action', 'RPG', 'Adventure', 'Sport', 'Horror'])
        ];
    }
}