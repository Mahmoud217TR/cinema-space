<?php

namespace App\Models\Traits;

use App\Classes\Duration;

trait HasDurationTrait{

    public function getDurationAttribute(){
        $duration = new Duration($this->duration_in_sec);
        return $duration->getDuration();
    }

    public function setDurationAttribute($value){
        $duration = new Duration($value);
        $this->duration_in_sec = $duration->getSeconds();
    }
}