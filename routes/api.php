<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('stores', StoreController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('orders', OrderController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});

// Route::post('auth/access-token', [AccessTokenController::class, 'store'])->middleware('guest:sanctum');
// Route::delete('auth/access-token/{token?}', [AccessTokenController::class, 'destroy'])->middleware('guest:sanctum');

Route::group([
    'middleware' => 'guest:sanctum',
], function () {
    Route::post('auth/access-token', [AccessTokenController::class, 'store']);
    Route::delete('auth/access-token/{token?}', [AccessTokenController::class, 'destroy']);

});
