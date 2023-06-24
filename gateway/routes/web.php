<?php

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

$router->group(['middleware' => 'client.credentials'], function() use ($router){
    
    $router->group(['prefix' => 'book'], function($router) {
        $router->get('/books', 'BooksController@showBooks');

        $router->get('/book/{id}', 'BooksController@showBook');

        $router->delete('/book/{id}', 'BooksController@deleteBook');

        $router->post('/book', 'BooksController@createBook');

        $router->patch('/book/{id}', 'BooksController@patchBook');
    });


    $router->group(['prefix' => 'author'], function($router) {
        $router->get('/authors', 'AuthorsController@showAuthors');

        $router->get('/author/{id}', 'AuthorsController@showAuthor');

        $router->delete('/author/{id}', 'AuthorsController@deleteAuthor');

        $router->post('/author', 'AuthorsController@createAuthor');

        $router->patch('/author/{id}', 'AuthorsController@patchAuthor');
    });

});