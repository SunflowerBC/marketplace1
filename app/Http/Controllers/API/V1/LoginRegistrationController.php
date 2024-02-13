<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegistrationController extends Controller
{
    use ApiResponse;
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->only(["email", "password"]), [
            "email"=>"required|string|email",
            "password"=>"required|string"
        ]);
        if ($validator->fails()){
            return  $this->errorResponse("Validation error", $validator->errors()->toArray(), 403);

        }

        $user = User::where("email", $request->get("email"))->first();

        if (!$user || Hash::check($request->get("password"), $user->password)){
            return $this->errorResponse("User not found!");
        }

        $data['token'] = $user->createToken($request->get("email"),['*'], now()->addWeek())->plainTextToken;
        $data['user'] = $user;

        return  $this->successResponse("User has loged", $data, 200);
    }
    public function register(Request $request): JsonResponse
    {
        $data = $request->only(["name", "email", "password"]);
        $validator = Validator::make($data, [
            "name" => "required|string",
            "email"=>"required|string|unique:users",
            "password"=>"required|string|min:8"
        ]);
        if ($validator->fails()){
            return  $this->errorResponse("Validation error", $validator->errors()->toArray(), 403);

        }
        $user = User::query()->create($data);
        $data['token'] = $user->createToken($request->get("email"),['*'], now()->addWeek())->plainTextToken;
        $data['user'] = $user;

        return  $this->successResponse("User was registered", $data, 201);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->successResponse("User logged out");
    }

}
