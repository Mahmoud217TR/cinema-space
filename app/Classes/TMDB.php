<?php

namespace App\Classes;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class TMDB {

    public static $base_uri = 'https://api.themoviedb.org/3/';

    public static function getAPIToken(){
        return env('TMDB_TOKEN');
    }

    public static function search($keyword){
        $client = new Client(['verify' => false]); // ['verify' => false] For HTTP
        $method = 'GET';
        $uri = self::$base_uri.'search/movie?api_key='.self::getAPIToken().'&query='.$keyword;

        $request = new GuzzleRequest($method,$uri);
        $response = $client->send($request);
        return json_decode($response->getBody()->getContents());
    }

    public static function movie($movie_id){
        $client = new Client(['verify' => false]); // ['verify' => false] For HTTP
        $method = 'GET';
        $uri = self::$base_uri.'movie/'.$movie_id.'?api_key='.self::getAPIToken();

        $request = new GuzzleRequest($method,$uri);
        $response = $client->send($request);
        return json_decode($response->getBody()->getContents());
    }
}