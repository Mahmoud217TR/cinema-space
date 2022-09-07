<?php

namespace App\Classes;

class Duration {

    private $seconds;

    public function __construct(int $seconds = 0, int $minutes = 0, $hours = 0){
        $this->seconds = $seconds + (60*$minutes) + (3600*$hours);
    }

    public function getSeconds(): int{
        return $this->seconds;
    }

    public function getMinutes(): int{
        return (int)($this->seconds/60);
    }

    public function getHours(): int{
        return (int)($this->seconds/3600);
    }

    public function getDuration(){
        return sprintf("%d:%'.02d:%'.02d",$this->getHours(),$this->getMinutes()%60,$this->getSeconds()%60);
    }
}