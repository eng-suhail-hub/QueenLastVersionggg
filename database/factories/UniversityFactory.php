<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => $this->faker->unique()->uuid(),
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Default password
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(),
            'status' => 'pending',
            'type' => $this->faker->randomElement(['public', 'private']),
            'location' => $this->faker->address(),
            'has_email_authentication' => false,
        ];
    }
}
