<?php

namespace App\Http\Livewire;

use App\Classes\TMDB;
use App\Models\Movie;
use Livewire\Component;

class Main extends Component
{
    public $results = [];
    public $keyword = null;


    public function search(){
        if($this->keyword){
            $this->results = $this->getMovies()->take(6);
        }else{
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.main')
            ->layout('layouts.livewire');
    }

    public function getMovies(){
        return collect(TMDB::search($this->keyword)->results);
    }
}
