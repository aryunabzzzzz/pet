<?php

use App\Http\Controllers\FoodController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('foods', [FoodController::class, 'index']);
Route::get('foods/{id}', [FoodController::class, 'show']);
Route::post('foods', [FoodController::class, 'store']);
Route::patch('foods/{id}', [FoodController::class, 'update']);
Route::delete('foods/{id}', [FoodController::class, 'destroy']);
Route::get('foods/{id}/image', [FoodController::class, 'getImg']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::patch('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
Route::get('users/{id}/cart', [UserController::class, 'getCart']);
Route::get('users/{id}/orders', [UserController::class, 'getOrders']);
