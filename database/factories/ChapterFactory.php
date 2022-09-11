<?php

namespace Database\Factories;

use App\Models\Comic;
use App\Models\Manga;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
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
            'state_id' => State::factory()->episode(),
        ];
    }

    public function manga()
    {
        return $this->state(function (array $attributes) {
            return [
                'chapters_of_type' => Manga::class,
                'chapters_of_id' => Manga::factory(),
            ];
        });
    }

    public function comic()
    {
        return $this->state(function (array $attributes) {
            return [
                'chapters_of_type' => Comic::class,
                'chapters_of_id' => Comic::factory(),
            ];
        });
    }

    public function withManga(Manga $manga)
    {
        return $this->state(function (array $attributes) use ($manga){
            return [
                'chapters_of_type' => Manga::class,
                'chapters_of_id' => $manga->id,
            ];
        });
    }

    public function withComic(Comic $comic)
    {
        return $this->state(function (array $attributes) use ($comic){
            return [
                'chapters_of_type' => Comic::class,
                'chapters_of_id' => $comic->id,
            ];
        });
    }
}
