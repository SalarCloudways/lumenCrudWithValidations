<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorRepository implements AuthorRepositoryInterface{
    
    //Add an Author
    public function create($request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    //Show All Authors
    public function showAllAuthors(){
        return response()->json(Author::all());
    }

    //Show Single Autor
    public function showSingleAuthor($id){
        return response()->json(Author::find($id));
    }

    //Delete Author with ID
    public function deleteAnAuthor($id){

        Author::findOrFail($id)->delete();

        return response('Deleted Successfully', 200);
    }

    //Update an Author
    public function updateAnAuthor($id, $request){
        
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);

    }
}

