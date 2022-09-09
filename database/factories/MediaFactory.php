<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\Cartoon;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Show;
use App\Models\State;
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
                'state_id' => State::factory()->movie(),
            ];
        });
    }

    public function show()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Show::class,
                'mediable_id' => Show::factory(),
                'state_id' => State::factory()->show(),
            ];
        });
    }

    public function series()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Series::class,
                'mediable_id' => Series::factory(),
                'state_id' => State::factory()->series(),
            ];
        });
    }

    public function anime()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Anime::class,
                'mediable_id' => Anime::factory(),
                'state_id' => State::factory()->anime(),
            ];
        });
    }

    public function cartoon()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Cartoon::class,
                'mediable_id' => Cartoon::factory(),
                'state_id' => State::factory()->cartoon(),
            ];
        });
    }
}
