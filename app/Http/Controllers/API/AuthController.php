<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8"],
                  ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()], 401);
        }


        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);

        $user = User::create($input);
        $user->remember_token = Str::random(25);
        $user->save();

        $token = $user->token();

        return response()->json(["token" => $token], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "string", "email", "max:255"],
            "password" => ["required", "string", "min:8"],

        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()], 401);
        }


        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["error" => "The provided credentials are incorrect."], 401);
        }


        return response()->json(["Bearer " => $user->token]);

    }


}
