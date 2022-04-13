<?php

namespace App\Repository;



use App\Http\Filters\BookFilter;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{

    public function get($book_id): Book
    {
       return  Book::findOrFail($book_id);
    }

    public function getAll(BookFilter $filter)
    {
        return Book::filter($filter)->get();
    }

    public function store($data): Book
    {
        return Book::create($data);
    }

    public function update($id,$data):bool
    {
    return Book::whereId($id)->update($data);
    }
    public function delete($id): bool
    {
        return Book::destroy($id);
    }
}
