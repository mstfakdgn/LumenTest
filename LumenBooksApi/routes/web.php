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

$router->get('/books', 'BookController@index');
$router->post('/book/add', 'BookController@add');
$router->get('/books/{bookId}', 'BookController@show');
$router->put('/books/update/{bookId}', 'BookController@update');
$router->patch('/books/update/{bookId}', 'BookController@update');
$router->delete('/books/delete/{bookId}', 'BookController@delete');
