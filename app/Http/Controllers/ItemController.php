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

        $client = new Client(); //GuzzleHttp\Client

        
        
        /*function zone($zone, $request){
            if($request->file($zone)) {
                $zone = [ 
                    'name'     => $zone,
                    'contents' => fopen( $request->file($zone)->getPathname(), 'r' ),
                    'filename' => $request->file($zone)->getClientOriginalName()];
                    return $zone;
            }
            return [
                'name' => '',
                'contents' => ''
            ];
            
        }

        $zone1 = zone('zone1', $request);
        $zone2 = zone('zone2', $request);
        $zone3 = zone('zone3', $request);
        $zone4 = zone('zone4', $request);*/
        

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
                    'contents' => fopen( $request->file('zone1')->getPathname(), 'r' ),
                    'filename' => $request->file('zone1')->getClientOriginalName()
                ],

                [
                    'name'     => 'zone1',
                    'contents' => fopen( $request->file('zone1')->getPathname(), 'r' ),
                    'filename' => $request->file('zone1')->getClientOriginalName()
                ],
                [
                    'name'     => 'zone2',
                    'contents' => fopen( $request->file('zone2')->getPathname(), 'r' ),
                    'filename' => $request->file('zone2')->getClientOriginalName()

                ],
                [
                    'name'     => 'zone3',
                    'contents' => fopen( $request->file('zone3')->getPathname(), 'r' ),
                    'filename' => $request->file('zone3')->getClientOriginalName()
                ],
                [
                    'name'     => 'zone4',
                    'contents' => fopen( $request->file('zone4')->getPathname(), 'r' ),
                    'filename' => $request->file('zone4')->getClientOriginalName()
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
                     /*[
                         'name'     => 'zone1',
                         'contents' => fopen( $request->file('zone1')->getPathname(), 'r' ),
                         'filename' => $request->file('zone1')->getClientOriginalName()
                     ],
                     [
                         'name'     => 'zone2',
                         'contents' => fopen( $request->file('zone2')->getPathname(), 'r' ),
                         'filename' => $request->file('zone2')->getClientOriginalName()
     
                     ],
                     [
                         'name'     => 'zone3',
                         'contents' => fopen( $request->file('zone3')->getPathname(), 'r' ),
                         'filename' => $request->file('zone3')->getClientOriginalName()
                     ],
                     [
                         'name'     => 'zone4',
                         'contents' => fopen( $request->file('zone4')->getPathname(), 'r' ),
                         'filename' => $request->file('zone4')->getClientOriginalName()
                     ],*/
                ]
             ]);
        }
        
        return redirect('scenarios');
    }

}
