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

    //Update an Author
    public function updateAnAuthor($id, $request){

        $author = new AuthorResource(Author::findOrFail($id));
        $author->update($request->all());

        return $author;

    }
}

