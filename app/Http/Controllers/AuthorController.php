<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Validations\AuthorValidation;
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

        $validator = Validator::make($request->all(), Author::$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $author = $this->authorRepository->create($request);

        return response()->json($author, 201);

    }

    //Update an Author
    public function updateAnAuthor(Request $request, $id){

        $request['authorID'] = $id; 

        $validator = Validator::make($request->all(), Author::$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $author = $this->authorRepository->updateAnAuthor($id, $request);

        return response($author, 200);

    }

}