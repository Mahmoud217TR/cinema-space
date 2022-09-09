<?php

namespace App\Models\Traits;

use App\Models\Episode;

trait EpisodableTrait{

    public function episodes(){
        return $this->morphMany(Episode::class, 'episodable');
    }


    public function guessEpisodableType(){
        return get_class($this);
    }
}