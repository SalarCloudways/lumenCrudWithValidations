<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface{
    
    //Add an Author
    public function create($request)
    {
        return new AuthorResource(Author::create($request->all()));
    }

    //Show All Authors
    public function showAllAuthors(){
        return AuthorResource::collection(Author::all());
    }

    //Delete Author with ID
    public function deleteAnAuthor($id){

        new AuthorResource(Author::findOrFail($id)->delete());

        return response('Deleted Successfully', 201);
    }

    //Update an Author
    public function updateAnAuthor($id, $request){

        $author = new AuthorResource(Author::findOrFail($id));
        $author->update($request->all());

        return $author;

    }
}

