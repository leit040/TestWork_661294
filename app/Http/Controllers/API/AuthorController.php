<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorFullResource;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->bearerToken() || !User::userByToken($request->bearerToken())){
            return response()->json(["error" => "Access Denied"], 403);
        }
        return  AuthorFullResource::collection(Author::all());
    }
}
