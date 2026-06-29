<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ComboController;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CustomerController;

// Public
Route::prefix('auth')
    ->middleware('throttle:login')
    ->group(function () {

        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/user-login', [AuthController::class, 'userloigin']);
    });

Route::prefix('stores')
    ->middleware('throttle:register')
    ->group(function () {

        Route::post('/register', [StoreController::class, 'registerStore']);
    });

Route::middleware('throttle:public-combo')
    ->group(function () {
        Route::get('/public/combo/{type}', [ComboController::class, 'publicCombo']);
    });

// Protected

Route::middleware('auth:api')->group(function () {
    // Auth
    Route::prefix('auth')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // Stores

    Route::prefix('stores')->group(function () {

        Route::get('{branchcode}', [StoreController::class, 'storeInfo']);
        Route::put('{branchcode}', [StoreController::class, 'updateStore']);
        Route::post('{branchcode}/logo', [StoreController::class, 'uploadLogo']);
    });

    // Resources

    Route::apiResource('products', ProductController::class);
    Route::apiResource('customers', CustomerController::class);

    // Settings

    Route::prefix('settings')->group(function () {

        Route::get('/combo/{type}', [ComboController::class, 'combo']);
    });
});
