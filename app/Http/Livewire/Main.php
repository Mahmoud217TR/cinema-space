<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Livewire\Component;

class Main extends Component
{
    public $results = [];
    public $keyword = null;


    public function search(){
        if($this->keyword){
            $this->results = Movie::where('name','like','%'.$this->keyword.'%')->limit(6)->get();
        }else{
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.main')
            ->layout('layouts.livewire');
    }
}
