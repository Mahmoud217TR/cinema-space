<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface Media {
    public function getReletables():MorphToMany;
}