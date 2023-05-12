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

use App\Models\Author;
use App\Http\Resources\AuthorResource;
use App\Http\Controllers\AuthorController;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "api"], function () use ($router) {

    //Add an Author
    $router->post('authors', ['uses' => 'AuthorController@create']);

    //Show All Authors
    $router->get('authors', ['uses' => 'AuthorController@showAll']);

    //Show Single Author
    $router->get('authors/{author}', function($author){
        return new AuthorResource($author);
    });

    //Delete Author with ID
    $router->delete('authors/{author}', function($author){
        $author->delete();
        return response('Deleted Successfully', 201);
    });

    //Update an Author
    $router->put('authors/{id}', ['uses' => 'AuthorController@updateAnAuthor']);
});
