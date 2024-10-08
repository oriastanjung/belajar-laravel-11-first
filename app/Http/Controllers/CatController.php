<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Support\Facades\Cache;

class CatController extends Controller
{

    public function getAllCatsData()
    {
        // pakai cache
        // $data = Cache::remember('cats_data', 3600, function () {
        //     $client = new Client(['verify' => false]);
        //     $response = $client->get('https://free-cat-api.vercel.app/cats');
        //     return json_decode($response->getBody(), true);
        // });

        // return $data;
        // buat tanpa cache
        $client = new Client(['verify' => false]);
        $response = $client->get('https://free-cat-api.vercel.app/cats');
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}
