<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition (): array {
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'name' => fake()->name(),
            'state' => fake()->unique()->city(),
        ];
    }
}
