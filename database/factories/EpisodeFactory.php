<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\Cartoon;
use App\Models\Season;
use App\Models\Series;
use App\Models\Show;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(),
            'release_date' => $this->faker->date(),
            'duration_in_sec' => $this->faker->numberBetween(200,12000),
            'state_id' => State::factory()->episode(),
            'season_id' => Season::factory(),
        ];
    }

    public function show()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodable_type' => Show::class,
                'episodable_id' => Show::factory(),
            ];
        });
    }

    public function series()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodable_type' => Series::class,
                'episodable_id' => Series::factory(),
            ];
        });
    }

    public function anime()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodable_type' => Anime::class,
                'episodable_id' => Anime::factory(),
            ];
        });
    }

    public function cartoon()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodable_type' => Cartoon::class,
                'episodable_id' => Cartoon::factory(),
            ];
        });
    }

    public function withSeason($season_id)
    {
        return $this->state(function (array $attributes) use ($season_id){
            return [
                'season_id' => $season_id,
            ];
        });
    }

    public function withShow($show_id)
    {
        return $this->state(function (array $attributes) use ($show_id){
            return [
                'episodable_type' => Show::class,
                'episodable_id' => $show_id,
            ];
        });
    }

    public function withSeries($series_id)
    {
        return $this->state(function (array $attributes) use ($series_id){
            return [
                'episodable_type' => Series::class,
                'episodable_id' => $series_id,
            ];
        });
    }

    public function withAnime($anime_id)
    {
        return $this->state(function (array $attributes) use ($anime_id){
            return [
                'episodable_type' => Anime::class,
                'episodable_id' => $anime_id,
            ];
        });
    }

    public function withCartoon($cartoon_id)
    {
        return $this->state(function (array $attributes) use ($cartoon_id){
            return [
                'episodable_type' => Cartoon::class,
                'episodable_id' => $cartoon_id,
            ];
        });
    }
}