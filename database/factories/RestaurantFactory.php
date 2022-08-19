<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Restaurant Name',
            'address' => fake()->address,
            'latitude' => fake()->randomFloat(20, 0, 99),
            'longitude' => fake()->randomFloat(20,0, 99),
            'rating' => fake()->randomFloat(2,0,5),
            'photo' => 'images/restaurant.jpg',
            'description' => fake()->text,
            'categoryId' => 1
        ];
    }
}
