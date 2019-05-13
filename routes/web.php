<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Gets all the items from API
Route::get('/scenarios', 'ItemController@listItems');

// Creates a new item through the api
Route::post('/scenarios/create', 'ItemController@createItem');

// Updates a specific item through the api
Route::post('/scenarios/update/{id}', 'ItemController@updateItem');

// Deletes an item trough the api
Route::get('/scenarios/delete/{id}', 'ItemController@deleteItem');


// Gets Table current State
Route::get('/table', 'TableController@getCurrentState');