<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("products", \App\Http\Controllers\API\V1\ProductController::class)->only(["index", "show"]);
Route::resource("categories", \App\Http\Controllers\API\V1\CategoryController::class)->only(["index", "show"]);


Route::post('login', [\App\Http\Controllers\API\V1\LoginRegistrationController::class, "login"]);
Route::get('register', [\App\Http\Controllers\API\V1\LoginRegistrationController::class, "register"]);
Route::get('logout', [\App\Http\Controllers\API\V1\LoginRegistrationController::class, "logout"]);
