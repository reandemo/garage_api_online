<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StoreController;


Route::GET('/', [StoreController::class, 'index']);