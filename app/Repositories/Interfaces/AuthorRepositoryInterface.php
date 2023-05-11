<?php

namespace App\Repositories\Interfaces;



Interface AuthorRepositoryInterface{
    
    //Add an Author
    public function create($request);

    //Show All Authors
    public function showAllAuthors();

    //Delete Author with ID
    public function deleteAnAuthor($id);

    //Update an Author
    public function updateAnAuthor($id, $request);
}