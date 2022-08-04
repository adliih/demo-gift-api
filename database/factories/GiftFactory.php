<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(2000, 5000000),
            'qty' => $this->faker->numberBetween(10, 20),
            'description' => $this->faker->text(),
            'rating' => $this->faker->randomFloat(null, 0.0, 5.0),
        ];
    }
}
