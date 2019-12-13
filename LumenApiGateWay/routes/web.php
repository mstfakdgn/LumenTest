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
$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    // Authors
    $router->get('/authors', 'AuthorController@index');
    $router->post('/author/add', 'AuthorController@add');
    $router->get('/authors/{authorId}', 'AuthorController@show');
    $router->put('/authors/update/{author}', 'AuthorController@update');
    $router->patch('/authors/update/{author}', 'AuthorController@update');
    $router->delete('/authors/delete/{author}', 'AuthorController@delete');

    // Books
    $router->get('/books', 'BookController@index');
    $router->post('/book/add', 'BookController@add');
    $router->get('/books/{bookId}', 'BookController@show');
    $router->put('/books/update/{bookId}', 'BookController@update');
    $router->patch('/books/update/{bookId}', 'BookController@update');
    $router->delete('/books/delete/{bookId}', 'BookController@delete');

    // For Users
    $router->get('/users', 'UserController@index');
    $router->post('/user/add', 'UserController@add');
    $router->get('/users/{userId}', 'UserController@show');
    $router->put('/users/update/{userId}', 'UserController@update');
    $router->patch('/users/update/{userId}', 'UserController@update');
    $router->delete('/users/delete/{userId}', 'UserController@delete');
});
