<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ComboController;
use App\Http\Controllers\Api\V1\StoreController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Version 1
|--------------------------------------------------------------------------
| REAN-PRO Laravel API
| Version: v1
| Author: REAN PROGRAMMING
|--------------------------------------------------------------------------
*/

    // User Login

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Legacy Login (Optional)

    Route::post('/user-login', [AuthController::class, 'userloigin']);

    /*

    |--------------------------------------------------------------------------

    | Public Store Routes

    |--------------------------------------------------------------------------

    */

    // Register New Store

    Route::post('/store/register', [StoreController::class, 'registerstore']);

    /*

    |--------------------------------------------------------------------------

    | Protected Routes

    |--------------------------------------------------------------------------

    */

    Route::middleware('auth:api')->group(function () {

        // Get Product List

        // Current User Information

        Route::get('/profile', [AuthController::class, 'profile']);

        // Logout

        Route::post('/logout', [AuthController::class, 'logout']);

    });

    Route::prefix('setting')->middleware('auth:api')->group(function () {
        Route::get('combo/{id}', [ComboController::class, 'combo']);
});




