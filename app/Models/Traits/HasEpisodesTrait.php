<?php

namespace App\Models\Traits;

use App\Models\Episode;
use App\Models\Season;

trait HasEpisodesTrait{

    public function episodes(){
        return $this->morphMany(Episode::class, 'episodes_of');
    }

    public function guessEpisodesOfType(){
        return get_class($this);
    }

    public function seasons(){
        $season_ids = $this->episodes()->pluck('season_id');
        return Season::find($season_ids);
    }

}