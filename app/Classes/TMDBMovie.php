<?php

namespace App\Classes;

use ArrayAccess;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class TMDBMovie {

    protected const ORGINAL_PATH = 'https://image.tmdb.org/t/p/original/';

    public function __construct($tmdbJson)
    {
        $this->backdrop = self::ORGINAL_PATH.$tmdbJson->backdrop_path;
        $this->budget = $tmdbJson->budget;
        $this->id = $tmdbJson->id;
        $this->overview = $tmdbJson->overview;
        $this->poster = self::ORGINAL_PATH.$tmdbJson->poster_path;
        $this->date = \Carbon\Carbon::create($tmdbJson->release_date);
        $this->revenue = $tmdbJson->revenue;
        $this->runtime = $tmdbJson->runtime;
        $this->status = $tmdbJson->status;
        $this->title = $tmdbJson->title;
        $this->rating = $tmdbJson->vote_average;
        $this->voters = $tmdbJson->vote_count;
    }

    public function toArray()
    {
        return collect($this);
    }
}