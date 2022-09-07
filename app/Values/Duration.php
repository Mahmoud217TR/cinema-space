<?php

namespace App\Values;

use App\Casts\ServiceCenterSettingsCaster;
use Illuminate\Contracts\Database\Eloquent\Castable;

class Duration implements Castable
{
    public int $seconds = 0;

    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    public static function fromSeconds(array $seconds): self
    {
        return new static($seconds);
    }

    public static function castUsing(array $arguments)
    {
        return DurationCaster::class;
    }
}
