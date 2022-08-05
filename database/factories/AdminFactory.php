<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'email' => 'admin@elsan.com',
            'password' => '$2y$10$luhRFicA9qv9Yi/I3nlLHuh3ZSdEO3g8X7EsFt97HMQ3MzhBGfoai',
        ];
    }
}
