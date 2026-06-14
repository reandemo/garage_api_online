<?php

use App\Http\Controllers\Api\BranchesController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\v1\StoreController;
use Illuminate\Support\Facades\Route;

Route::post('userloigin', [AuthController::class, 'userloigin']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

});

Route::get('/users', function () {
    return response()->json(['message' => 'This is the V1 users list']);
});

Route::prefix('setting')->middleware('auth:api')->group(function () {
    // Branch
    Route::controller(StoreController::class)->group(function () {
        Route::post(
            '/store/register','registerstore'
        );
    });

});


Route::post(
    'store/register',
    [StoreController::class, 'registerstore']
);




