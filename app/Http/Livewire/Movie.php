<?php

namespace App\Http\Livewire;

use App\Classes\TMDB;
use Livewire\Component;

class Movie extends Component
{
    public $movie = null;

    public function mount($id){
        $this->movie = collect(TMDB::movie($id));
    }

    public function render()
    {
        return view('livewire.movie')
            ->layout('layouts.livewire');
    }
}
