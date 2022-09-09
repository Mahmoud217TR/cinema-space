<?php

namespace App\Models\Traits;

use App\Models\Media;
use App\Models\State;

trait StatableTrait{

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function guessStatableType(){
        return get_class($this);
    }
}