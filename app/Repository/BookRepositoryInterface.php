<?php

namespace App\Repository;


use App\Http\Filters\BookFilter;
use App\Models\Book;

interface BookRepositoryInterface
{
public function get($book_id):Book;

public function getAll(BookFilter $filter);

public function update($id, $data):bool;

public function store($data):Book;

public function delete($id):bool;




}
