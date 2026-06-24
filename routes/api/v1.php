<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ComboController;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CustomerController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::middleware('throttle:login')->group(function () {

    Route::post(
        '/login',
        [AuthController::class, 'login']
    );

});

Route::middleware('throttle:register')->group(function () {

    Route::post(
        '/register',
        [AuthController::class, 'register']
    );

    Route::post(
        '/user-login',
        [AuthController::class, 'userloigin']
    );

    Route::post(
        '/store/register',
        [StoreController::class, 'registerStore']
    );

});

Route::middleware('throttle:public-combo')->group(function () {

    Route::get(
        '/public/combo/{id}',
        [ComboController::class, 'publicCombo']
    );

});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [AuthController::class, 'profile']
    );

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    );

    /*
    |--------------------------------------------------------------------------
    | Store Information
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/store/info/{branchcode}',
        [StoreController::class, 'storeInfo']
    );

    Route::put(
        '/store/update/{branchcode}',
        [StoreController::class, 'updateStore']
    );

    Route::post(
        '/store/upload-logo/{branchcode}',
        [StoreController::class, 'uploadLogo']
    );

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'products',
        ProductController::class
    );

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'customers',
        CustomerController::class
    );

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    Route::prefix('setting')->group(function () {

        Route::get(
            '/combo/{id}',
            [ComboController::class, 'combo']
        );

    });

});