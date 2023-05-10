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

use App\Http\Controllers\AuthorNewController;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "api"], function () use ($router) {


    //Add an Author
    $router->post('authors', ['uses' => 'AuthorController@create']);

    //Show All Authors
    $router->get('authors', ['uses' => 'AuthorController@showAll']);

    //Show Single Author
    $router->get('authors/{id}', ['uses' => 'AuthorController@showSingleAuthor']);

    //Delete Author with ID
    $router->delete('authors/{id}', ['uses' => 'AuthorController@deleteAnAuthor']);

    //Update an Author
    $router->put('authors/{id}', ['uses' => 'AuthorController@updateAnAuthor']);
});
