<?php

use App\Http\Controllers\Cliente\DestroyController;
use App\Http\Controllers\Cliente\IndexController;
use App\Http\Controllers\Cliente\ShowController;
use App\Http\Controllers\Cliente\StoreController;
use App\Http\Controllers\Cliente\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('clientes', IndexController::class);
Route::post('clientes', StoreController::class);
Route::get('clientes/{id}', ShowController::class);
Route::put('clientes/{id}', UpdateController::class);
Route::delete('clientes/{id}', DestroyController::class);
