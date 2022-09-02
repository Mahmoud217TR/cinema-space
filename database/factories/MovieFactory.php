<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->date('Y-m-d'),
            'dur_in_sec' => $this->faker->numberBetween(1,10000),
            'rating' => $this->faker->randomFloat(1,1,10),
        ];
    }
}
