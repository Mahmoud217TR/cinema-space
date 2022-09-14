<?php

namespace App\Http\Livewire;

use App\Classes\TMDB;
use App\Classes\TMDBMovie;
use Livewire\Component;

class Movie extends Component
{
    public $movie = null;

    public function mount($id){
        $this->movie = new TMDBMovie(TMDB::movie($id));
        $this->movie = $this->movie->toArray();
    }

    public function render()
    {
        return view('livewire.movie')
            ->layout('layouts.livewire');
    }
}
