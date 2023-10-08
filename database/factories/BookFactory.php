<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "author" => fake()->name(),
            "description" => fake()->text(30),
            "released_year" => "2 May 1978",
            "admin_id" => User::all()->random()->id,
            "book_url" => "test_url"
        ];
    }
}
