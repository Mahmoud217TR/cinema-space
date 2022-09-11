<?php

namespace App\Models;

use App\Models\Traits\HasChaptersTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory, MediableTrait, HasChaptersTrait;

    protected $with = ['media'];
}
