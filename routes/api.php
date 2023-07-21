<?php

use App\Http\Controllers\Customer\DestroyController;
use App\Http\Controllers\Customer\IndexController;
use App\Http\Controllers\Customer\ShowController;
use App\Http\Controllers\Customer\StoreController;
use App\Http\Controllers\Customer\UpdateController;
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


Route::get('customers', IndexController::class);
Route::post('customers', StoreController::class);
Route::get('customers/{id}', ShowController::class);
Route::put('customers/{id}', UpdateController::class);
Route::delete('customers/{id}', DestroyController::class);
