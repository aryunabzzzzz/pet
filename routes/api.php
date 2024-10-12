<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodExportController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueryBuilder;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::controller(FoodController::class)->group(function () {
    Route::get('foods', 'index');
    Route::get('foods/{id}', 'show');
    Route::post('foods', 'store');
    Route::patch('foods/{id}', 'update');
    Route::delete('foods/{id}', 'destroy');
});

Route::get('users', [CustomerController::class, 'index']);
Route::get('users/{id}', [CustomerController::class, 'show']);
Route::post('users', [CustomerController::class, 'store']);
Route::patch('users/{id}', [CustomerController::class, 'update']);
Route::delete('users/{id}', [CustomerController::class, 'destroy']);

Route::controller(CartController::class)->group(function () {
    Route::get('carts','index');
    Route::get('carts/{id}','show');
    Route::post('carts', 'store');
    Route::patch('carts/{id}', 'update');
    Route::delete('carts/{id}', 'destroy');
});

Route::get('images',[ImageController::class,'index']);
Route::get('images/{id}',[ImageController::class,'show']);
Route::delete('images/{id}',[ImageController::class,'destroy']);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('orders', 'index');
    Route::get('orders/{id}', 'show');
    Route::post('orders', 'store');
    Route::delete('orders/{id}', 'destroy');
});

Route::get('uploads', [UploadsController::class, 'index']);
Route::get('export', [FoodExportController::class, 'export']);
//Route::get('get', [FoodExportController::class, 'getAll']);

Route::get('test', [QueryBuilder::class, 'index']);
