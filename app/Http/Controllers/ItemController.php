<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ItemController extends Controller
{
    // Gets all items from API
    public function listItems()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/items');
        $items = json_decode($response->getBody()->getContents());

        $response = $client->request('GET', env('API_URL').'api/thematics');
        $thematics = json_decode($response->getBody()->getContents());
        //var_dump($items);

        


        return view('scenarioManager', ['items' => $items, 'thematics' => $thematics]);
    }

    // Delete an item from API
    public function deleteItem($id)
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/item/delete/'.$id);
        return redirect('scenarios');
    }

    // Create an item trought the API
    public function createItem(Request $request)
    {

        //GuzzleHttp\Client
        $client = new Client(); 
 
        // Maps values from the form-data
        $result = $client->post(env('API_URL').'api/item/new', [
           'multipart' => [
                [
                    'name' => 'name',
                    'contents' => $request->name,
                ],
                [
                    'name' => 'card_id',
                    'contents' => $request->card_id
                ],

                [
                    'name'     => 'card_picture',
                    'contents' => fopen( $request->file('card_picture')->getPathname(), 'r' ),
                    'filename' => $request->file('card_picture')->getClientOriginalName()
                ],
                [
      
                    'name'     => 'zone1',
                    'contents' => ($request->file('zone1')) ? fopen( $request->file('zone1')->getPathname(), 'r' ) : '',
                    'filename' => ($request->file('zone1')) ? $request->file('zone1')->getClientOriginalName() : ''
                ],
                [
      
                    'name'     => 'zone2',
                    'contents' => ($request->file('zone2')) ? fopen( $request->file('zone2')->getPathname(), 'r' ) : '',
                    'filename' => ($request->file('zone2')) ? $request->file('zone2')->getClientOriginalName() : ''
                ],
                [
      
                    'name'     => 'zone3',
                    'contents' => ($request->file('zone3')) ? fopen( $request->file('zone3')->getPathname(), 'r' ) : '',
                    'filename' => ($request->file('zone3')) ? $request->file('zone3')->getClientOriginalName() : ''
                ],
                [
      
                    'name'     => 'zone4',
                    'contents' => ($request->file('zone4')) ? fopen( $request->file('zone4')->getPathname(), 'r' ) : '',
                    'filename' => ($request->file('zone4')) ? $request->file('zone4')->getClientOriginalName() : ''
                ],

                

           ]
        ]);
        return redirect('scenarios');
    }


    // Create an item trought the API
    public function updateItem(Request $request, $id)
    {

        $client = new Client(); //GuzzleHttp\Client


        // Maps values from the form-data
        if($request->file('card_picture')){
            $result = $client->post(env('API_URL').'api/item/'.$id, [
                'multipart' => [
                        [
                            'name' => 'name',
                            'contents' => $request->name,
                        ],
                        [
                            'name' => 'card_id',
                            'contents' => $request->card_id
                        ],
                        [
                            'name' => 'thematic_id',
                            'contents' => $request->thematic_id
                        ],
                        [
                            'name' => 'card_picture',
                            'contents' => fopen( $request->file('card_picture')->getPathname(), 'r' ),
                            'filename' => $request->file('card_picture')->getClientOriginalName()
                        ]
                ]
            ]);
        }
        else {
            $result = $client->post(env('API_URL').'api/item/'.$id, [
                'multipart' => [
                     [
                         'name' => 'name',
                         'contents' => $request->name,
                     ],
                     [
                         'name' => 'card_id',
                         'contents' => $request->card_id
                     ],
                     [
                         'name' => 'thematic_id',
                         'contents' => $request->thematic_id
                     ],
                ]
             ]);
        }
        
        return redirect('scenarios');
    }

}
