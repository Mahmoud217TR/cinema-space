<?php

namespace App\Models;

use App\Models\Traits\HasEpisodesTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory, MediableTrait, HasEpisodesTrait;

    protected $with = ['media'];
}
