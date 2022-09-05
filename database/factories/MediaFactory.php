<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
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
            'description' => $this->faker->text(),
            'release_date' => $this->faker->date('y-m-d'),
            'mediable_type' => Movie::class,
            'mediable_id' => Movie::factory(),
        ]; 
    }
}
