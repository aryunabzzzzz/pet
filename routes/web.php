<?php

use App\Algoritms\chapter1\BinarySearch;
use App\Http\Controllers\FoodExportController;
use App\Patterns\Behavioral\ChainOfResponsibility\ChainController;
use App\Patterns\Behavioral\Observer\ObserverController;
use App\Patterns\Behavioral\State\StateController;
use App\Patterns\Behavioral\Strategy\StrategyController;
use App\Patterns\Generative\AbstractFactory\AbstractController;
use App\Patterns\Generative\Builder\BuilderController;
use App\Patterns\Structural\Adapter\AdapterController;
use App\Patterns\Structural\Composite\CompositeController;
use App\Patterns\Structural\Decorator\DecoratorController;
use App\Patterns\Structural\Proxy\ProxyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('abstractFactory',[AbstractController::class, 'showDevices']);
Route::get('builder', [BuilderController::class, 'getPizza']);

Route::get('adapter', [AdapterController::class, 'adapter']);
Route::get('decorator', [DecoratorController::class, 'decorate']);
Route::get('composite', [CompositeController::class, 'composite']);
Route::get('proxy', [ProxyController::class, 'proxy']);

Route::get('strategy', [StrategyController::class, 'strategy']);
Route::get('observer', [ObserverController::class, 'observe']);
Route::get('state', [StateController::class, 'state']);
Route::get('chain', [ChainController::class, 'chain']);

Route::get('exportedFiles', [FoodExportController::class, 'getFiles']);

Route::get('binary', [BinarySearch::class. 'binarySearch']);

Route::get('test', [\App\Algoritms\test::class, 'test']);
