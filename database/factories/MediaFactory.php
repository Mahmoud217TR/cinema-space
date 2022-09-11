<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\Book;
use App\Models\Cartoon;
use App\Models\Comic;
use App\Models\Game;
use App\Models\Manga;
use App\Models\Movie;
use App\Models\Music;
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

    public function game()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Game::class,
                'mediable_id' => Game::factory(),
                'state_id' => State::factory()->game(),
            ];
        });
    }

    public function music()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Music::class,
                'mediable_id' => Music::factory(),
                'state_id' => State::factory()->music(),
            ];
        });
    }

    public function book()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Book::class,
                'mediable_id' => Book::factory(),
                'state_id' => State::factory()->book(),
            ];
        });
    }

    public function manga()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Manga::class,
                'mediable_id' => Manga::factory(),
                'state_id' => State::factory()->manga(),
            ];
        });
    }
    
    public function comic()
    {
        return $this->state(function (array $attributes) {
            return [
                'mediable_type' => Comic::class,
                'mediable_id' => Comic::factory(),
                'state_id' => State::factory()->comic(),
            ];
        });
    }
}
