<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Series;
use App\Models\Show;
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
            'release_date' => $this->faker->date('y-m-d')         
        ]; 
    }

    public function movie()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Movie::class,
                'mediable_id' => Movie::factory(),
            ];
        });
    }

    public function show()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Show::class,
                'mediable_id' => Show::factory(),
            ];
        });
    }

    public function series()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Series::class,
                'mediable_id' => Series::factory(),
            ];
        });
    }
}
