<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('foods', [FoodController::class, 'index']);
Route::get('foods/{id}', [FoodController::class, 'show']);
Route::post('foods', [FoodController::class, 'store']);
Route::patch('foods/{id}', [FoodController::class, 'update']);
Route::delete('foods/{id}', [FoodController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::patch('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('carts',[CartController::class,'index']);
Route::get('carts/{id}',[CartController::class,'show']);
Route::post('carts', [CartController::class, 'store']);
Route::patch('carts/{id}', [CartController::class, 'update']);
Route::delete('carts/{id}', [CartController::class, 'destroy']);

Route::get('images',[ImageController::class,'index']);
Route::get('images/{id}',[ImageController::class,'show']);
Route::delete('images/{id}',[ImageController::class,'destroy']);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

