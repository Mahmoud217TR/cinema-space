<?php

namespace App\Classes;

class Duration {

    private $seconds;

    public function __construct($seconds = 0, int $minutes = 0, $hours = 0){
        if(is_int($seconds)){
            $this->setDuration($seconds, $minutes, $hours);
        }else if(is_string($seconds)){
            $this->setDurationFromString($seconds);
        }
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

    public function setSeconds(int $second){
        $this->seconds = $second;
    }

    public function setMinutes(int $minutes){
        $this->seconds = $minutes*60;
    }

    public function setHours(int $hours){
        $this->seconds = $hours*3600;
    }

    public function setDuration(int $seconds = 0, int $minutes = 0, $hours = 0) {
        $this->seconds = $seconds + (60*$minutes) + (3600*$hours);
    }

    public function setDurationFromString(string $string = "00:00:00") {
        $duration_parts = explode(':',$string);
        echo(int)($duration_parts[0]);
        $this->setDuration(
            (int)($duration_parts[2]),
            (int)($duration_parts[1]),
            (int)($duration_parts[0])
        );
    }
}