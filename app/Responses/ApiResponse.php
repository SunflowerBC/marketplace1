<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public  function successResponse(string $message = "success",array $data=[], int $code = 200) : JsonResponse
    {
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data
        ], $code);
    }

    public  function errorResponse(string $message = "error",array $data=[], int $code = 403) : JsonResponse
    {
        return response()->json([
            "status" => false,
            "message" => $message,
            "data" => $data
        ], $code);
    }
}
