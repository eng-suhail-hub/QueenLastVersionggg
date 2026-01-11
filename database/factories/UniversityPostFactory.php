<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\University;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UniversityPost>
 */
class UniversityPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraphs(3, true),
            'university_id' => University::factory(),
        ];
            return [
                'title' => $this->faker->sentence(6),
                'content' => $this->faker->paragraphs(3, true),
                'university_id' => University::factory(),
            ];
    }
}
