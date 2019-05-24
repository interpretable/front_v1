<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MachineController extends Controller
{
    public function listMachines()
    {
        
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/machines');
        $machines = json_decode($response->getBody()->getContents());
           
        return view('machines', ['machines' => $machines]);
    }

    public function listMachine($id)
    {
        
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/machine/'.$id);
        $machine = json_decode($response->getBody()->getContents());

        /*$response = $client->request('GET', env('API_URL').'api/machine');
        $thematics = json_decode($response->getBody()->getContents());*/
        //var_dump($machines);
           
        return view('machine', ['machine' => $machine]);
    }
}
