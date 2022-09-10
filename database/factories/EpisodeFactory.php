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
                'episodes_of_type' => Show::class,
                'episodes_of_id' => Show::factory(),
            ];
        });
    }

    public function series()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodes_of_type' => Series::class,
                'episodes_of_id' => Series::factory(),
            ];
        });
    }

    public function anime()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodes_of_type' => Anime::class,
                'episodes_of_id' => Anime::factory(),
            ];
        });
    }

    public function cartoon()
    {
        return $this->state(function (array $attributes) {
            return [
                'episodes_of_type' => Cartoon::class,
                'episodes_of_id' => Cartoon::factory(),
            ];
        });
    }

    public function withSeason(Season $season)
    {
        return $this->state(function (array $attributes) use ($season){
            return [
                'season_id' => $season->id,
            ];
        });
    }

    public function withShow(Show $show)
    {
        return $this->state(function (array $attributes) use ($show){
            return [
                'episodes_of_type' => Show::class,
                'episodes_of_id' => $show->id,
            ];
        });
    }

    public function withSeries(Series $series)
    {
        return $this->state(function (array $attributes) use ($series){
            return [
                'episodes_of_type' => Series::class,
                'episodes_of_id' => $series->id,
            ];
        });
    }

    public function withAnime(Anime $anime)
    {
        return $this->state(function (array $attributes) use ($anime){
            return [
                'episodes_of_type' => Anime::class,
                'episodes_of_id' => $anime->id,
            ];
        });
    }

    public function withCartoon($cartoon_id)
    {
        return $this->state(function (array $attributes) use ($cartoon_id){
            return [
                'episodes_of_type' => Cartoon::class,
                'episodes_of_id' => $cartoon_id,
            ];
        });
    }
}
