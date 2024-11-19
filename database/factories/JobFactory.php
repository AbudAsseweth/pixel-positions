<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "employer_id" => Employer::factory(),
            "title" => fake()->jobTitle(),
            "salary" => fake()->randomElement(['$90,000 USD', '$50,000 USD', '$150,000 USD']),
            "location" => "Green Hill",
            "schedule" => "Full Time",
            "url" => fake()->url(),
            "featured" => false,
        ];
    }

    public function featured(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'featured' => true,
            ];
        });
    }
}
