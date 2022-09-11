<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Episode;
use App\Models\Media;
use App\Models\Season;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
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
            'comment' => $this->faker->text(),
            'rate' => $this->faker->numberBetween(1,10),
            'weight' => $this->faker->numberBetween(1,5),
            'spoiler' => $this->faker->boolean(20),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function media()
    {
        return $this->state(function (array $attributes) {
            return [
                'ratable_type' => Media::class,
                'ratable_id' => Media::factory(),
            ];
        });
    }

    public function episode()
    {
        return $this->state(function (array $attributes) {
            return [
                'ratable_type' => Episode::class,
                'ratable_id' => Episode::factory(),
            ];
        });
    }

    public function season()
    {
        return $this->state(function (array $attributes) {
            return [
                'ratable_type' => Season::class,
                'ratable_id' => Season::factory(),
            ];
        });
    }

    public function chapter()
    {
        return $this->state(function (array $attributes) {
            return [
                'ratable_type' => Chapter::class,
                'ratable_id' => Chapter::factory(),
            ];
        });
    }

    public function withMedia(Media $media)
    {
        return $this->state(function (array $attributes) use ($media) {
            return [
                'ratable_type' => Media::class,
                'ratable_id' => $media->id,
            ];
        });
    }

    public function withEpisode(Episode $episode)
    {
        return $this->state(function (array $attributes) use ($episode) {
            return [
                'ratable_type' => Episode::class,
                'ratable_id' => $episode->id,
            ];
        });
    }

    public function withSeason(Season $season)
    {
        return $this->state(function (array $attributes) use ($season) {
            return [
                'ratable_type' => Season::class,
                'ratable_id' => $season->id,
            ];
        });
    }

    public function withChapter(Chapter $chapter)
    {
        return $this->state(function (array $attributes) use ($chapter) {
            return [
                'ratable_type' => Chapter::class,
                'ratable_id' => $chapter->id,
            ];
        });
    }

    public function withNewUser(Chapter $chapter)
    {
        return $this->state(function (array $attributes) use ($chapter) {
            return [
                'user_id' => User::factory(),
            ];
        });
    }
    
}
