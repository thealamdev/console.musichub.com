<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = [
            'Pop',
            'Rock',
            'Hip Hop',
            'Jazz',
            'Classical',
            'Electronic',
            'EDM',
            'House',
            'Techno',
            'Trance',
            'Blues',
            'Country',
            'Folk',
            'R&B',
            'Soul',
            'Reggae',
            'Metal',
            'Indie',
            'Alternative',
            'K-Pop',
            'J-Pop',
            'Bollywood',
            'Lo-fi'
        ];

        $name = $this->faker->unique()->randomElement(array: $genres);

        return [
            'name' => $name,
            'slug' => Str::slug(title: $name),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
