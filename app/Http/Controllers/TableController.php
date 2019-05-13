<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class TableController extends Controller
{
    // Get the table state from api 
    public function getCurrentState()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/state');
        
        $item = json_decode($response->getBody()->getContents());
        return view('tableManager', ['item' => $item]);

        
    }
}
