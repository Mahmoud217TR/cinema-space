<?php

namespace App\Models\Traits;

use App\Models\Episode;
use App\Models\Season;

trait EpisodableTrait{

    public function episodes(){
        return $this->morphMany(Episode::class, 'episodable');
    }

    public function guessEpisodableType(){
        return get_class($this);
    }

    public function seasons(){
        $season_ids = $this->episodes()->pluck('season_id');
        return Season::find($season_ids);
    }

}