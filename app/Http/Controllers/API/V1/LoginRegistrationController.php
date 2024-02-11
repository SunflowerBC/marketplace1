<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegistrationController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "email"=>"required|string",
            "password"=>"required|string"
        ]);
        if ($validator->fails()){
            return response()->json([
                "status"=>"error",
                "data"=>$validator->errors()
            ], 403);
        }

        $user = User::where("email", $request->get("email"))->first();
        if (!$user || Hash::check($request->get("password"), $user->password)){
            return response()->json([
                "status"=>"error",
                "message"=>"User not found!"
            ], 403);
        }
        dd($user);
    }
    public function register()
    {

    }
    public function logout()
    {

    }
}
