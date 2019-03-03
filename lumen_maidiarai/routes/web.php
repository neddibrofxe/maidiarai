<?php

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

$router->post('/diary', 'DiaryController@create');
$router->get('/diary', 'DiaryController@read');
$router->post('/diary/{id}', 'DiaryController@update');
$router->delete('/diary/{id}', 'DiaryController@delete');
$router->get('/diary/{id}', 'DiaryController@detail');
