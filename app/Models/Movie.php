<?php

namespace App\Models;

use App\Models\Interfaces\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Movie extends Model implements Media
{
    use HasFactory;

    public function getReletables():MorphToMany{
        return $this->morphToMany(Media::class,'media','reletables');
    }
}
