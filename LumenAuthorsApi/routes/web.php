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

$router->get('/authors', 'AuthorController@index');
$router->post('/author/add', 'AuthorController@add');
$router->get('/authors/{authorId}', 'AuthorController@show');
$router->put('/authors/update/{author}', 'AuthorController@update');
$router->patch('/authors/update/{author}', 'AuthorController@update');
$router->delete('/authors/delete/{author}', 'AuthorController@delete');
