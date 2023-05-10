<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorController extends Controller{

    private $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }


    public function showAll(){
        $allAuthors = $this->authorRepository->showAllAuthors();

        return response()->json($allAuthors);
    }

    //Add an Author
    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required | email',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    //Show Single Autor
    public function showSingleAuthor(Request $request ,$id){
        $request['authorID'] = $id; 
        $this->validate($request, [
            'authorID' => 'regex:/^[0-9]*$/',
        ]);
        return response()->json(Author::find($id));
    }

    //Delete Author with ID
    public function deleteAnAuthor(Request $request ,$id){
        
        $request['authorID'] = $id; 
        $this->validate($request, [
            'authorID' => 'regex:/^[0-9]*$/',
        ]);

        Author::findOrFail($id)->delete();

        return response('Deleted Successfully', 200);
    }

    //Update an Author
    public function updateAnAuthor(Request $request, $id){

        $request['authorID'] = $id; 

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required | email',
            'authorID' => 'regex:/^[0-9]*$/',
        ]);
        
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);

    }

}