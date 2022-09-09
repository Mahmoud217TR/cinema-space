<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\Cartoon;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Season;
use App\Models\Series;
use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }

    public function movie()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Movie::class,
            ];
        });
    }

    public function show()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Show::class,
            ];
        });
    }

    public function series()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Series::class,
            ];
        });
    }

    public function season()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Season::class,
            ];
        });
    }

    public function episode()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Episode::class,
            ];
        });
    }

    public function anime()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Anime::class,
            ];
        });
    }

    public function cartoon()
    {
        return $this->state(function (array $attributes) {
            return [
                'statable_type' => Cartoon::class,
            ];
        });
    }
}
