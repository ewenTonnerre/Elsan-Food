<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->dateTime,
            'amount' => fake()->randomFloat(6, 0, 1100),
            'restaurantId' => fake()->numberBetween(1,10),
            'userId' => 1,
        ];
    }
}
