<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Dish Name',
            'photo' => 'images/pasta.jpg',
            'description' => fake()->text,
            'price' => fake()->randomFloat(5,0, 999.99),
            'restaurantId' => fake()->numberBetween(1,10)
        ];
    }
}
