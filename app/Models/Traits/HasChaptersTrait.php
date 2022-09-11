<?php

namespace App\Models\Traits;

use App\Models\Chapter;

trait HasChaptersTrait{

    public function chapters(){
        return $this->morphMany(Chapter::class, 'chapters_of');
    }

    public function guessChaptersOfType(){
        return get_class($this);
    }

}