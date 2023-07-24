<?php

use App\Http\Controllers\Customer\DestroyController;
use App\Http\Controllers\Customer\IndexController;
use App\Http\Controllers\Customer\ShowController;
use App\Http\Controllers\Customer\StoreController;
use App\Http\Controllers\Customer\UpdateController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
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


Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', IndexController::class);
        Route::post('/', StoreController::class);
        Route::get('/{id}', ShowController::class);
        Route::put('/{id}', UpdateController::class);
        Route::delete('/{id}', DestroyController::class);
    });
});
