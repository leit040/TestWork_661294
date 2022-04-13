<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookFullResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\User;
use App\Repository\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request, BookFilter $filter)
    {

        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        return BookFullResource::collection($this->bookRepository->getAll($filter));
    }


    public function store(BookStoreRequest $request)
    {
        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        $book = $this->bookRepository->store($request->validated());
        $book->authors()->attach($request->get('authors'));
        return new BookResource($book);
    }

    public function show(Request $request, $id): BookResource
    {

        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        return new BookResource($this->bookRepository->get($id));
    }

    public function update(BookUpdateRequest $request, $id)
    {

        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        $data = $request->validated();
        unset($data['authors']);
       $this->bookRepository->update($id, $data);
       $book = $this->bookRepository->get($id);
       $book->authors()->sync($request->get('authors'));
        return new BookResource($book);
    }

    public function destroy(Request $request,$id)
    {

        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        $this->bookRepository->delete($id);
        return response(201);
    }
}
