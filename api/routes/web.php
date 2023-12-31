<?php

use App\Http\Controllers\LumenAuthController;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'LumenAuthController@login');
    $router->post('logout', 'LumenAuthController@logout');
    $router->post('refresh', 'LumenAuthController@refresh');

    $router->post('me', 'LumenAuthController@me');

    $router->get('home', 'HomeController@listar');
    $router->post('home/criar', 'HomeController@criar');
    $router->put('home/editar', 'HomeController@editar');
    $router->delete('home/deletar', 'HomeController@deletar');
});
