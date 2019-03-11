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

$router->post('/post', 'PostController@create');
$router->get('/post', 'PostController@read');
$router->post('/post/{id}', 'PostController@update');
$router->delete('/post/{id}', 'PostController@delete');
$router->get('/post/{id}', 'PostController@detail');


$router->post('/category', 'CategoryController@create');
$router->get('/category', 'CategoryController@read');
$router->post('/category/{id}', 'CategoryController@update');
$router->delete('/category/{id}', 'CategoryController@delete');
$router->get('/category/{id}', 'CategoryController@detail');
