<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/person', function(){
//     $person  = [
//         'first_name' => 'Max',
//         'last_name' => 'Don',
//     ];
//     return $person;
// });

use App\Person;

Route::get('/person/', 'PersonController@index');
Route::put('/person/{person}', 'PersonController@update');
Route::get('/person/{person}', 'PersonController@show');
Route::delete('/person/{person}', 'PersonController@destroy');
Route::post('/person/', 'PersonController@add');