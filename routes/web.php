<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\GenderController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/genders','GenderController@index');
$router->post('/genders', 'GenderController@store');
$router->get('/genders/{gender}','GenderController@show');
$router->put('/genders/{gender}','GenderController@update');
$router->patch('/genders/{gender}','GenderController@update');
$router->delete('/genders/{gender}','GenderController@destroy');
