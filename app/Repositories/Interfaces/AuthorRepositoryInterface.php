<?php

namespace App\Repositories\Interfaces;



Interface AuthorRepositoryInterface{
    
    //Add an Author
    public function create($request);

    //Show All Authors
    public function showAllAuthors();

    //Update an Author
    public function updateAnAuthor($id, $request);
}