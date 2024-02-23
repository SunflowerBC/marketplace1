<?php

use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\ColorController;
use App\Http\Controllers\API\V1\LoginRegistrationController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\SizeController;
use App\Http\Controllers\CartController;
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

Route::resource("products", ProductController::class)->only(["index", "show"]);
Route::resource("categories", CategoryController::class)->only(["index", "show"]);
Route::resource("sizes", SizeController::class);
Route::resource("sizes", SizeController::class);
Route::resource("color", ColorController::class);


Route::post('login', [LoginRegistrationController::class, "login"]);
Route::post('register', [LoginRegistrationController::class, "register"]);


Route::group(["middleware"=>"auth:sanctum"], function (){
    Route::post('logout', [LoginRegistrationController::class, "logout"]);
    Route::get('cart', [CartController::class, "cartItems"]);
    Route::put('cart', [CartController::class, "addCartProduct"]);
    Route::delete('cart', [CartController::class, "removeCartProduct"]);
    Route::post("cart/create-order", [CartController::class, "changeOrderStateToPending"]);
});
