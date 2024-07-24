<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 10),
            'name' => fake()->text(50),
            'sku' => strtoupper(Str::random(8)),
            'img_thumb' => fake()->imageUrl(320, 240),
            'price' => fake()->numberBetween(100000, 10000000),
            'quantity' => fake()->numberBetween(1, 100),
            'overview' => fake()->text(200),
            'content' => fake()->text(200),

        ];
    }
}
