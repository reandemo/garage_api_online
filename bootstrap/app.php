<?php

use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        then: function () {

            Route::middleware('api')
                ->prefix('api/v1')
                ->group(base_path('routes/api/v1.php'));

            Route::middleware('api')
                ->prefix('api/v2')
                ->group(base_path('routes/api/v2.php'));
        }
    )

    ->withMiddleware(function (Middleware $middleware): void {
        //
    })

    ->withExceptions(function (Exceptions $exceptions): void {

        /*
        |--------------------------------------------------------------------------
        | Validation Error (422)
        |--------------------------------------------------------------------------
        */
        $exceptions->render(function (
            ValidationException $e,
            $request
        ) {
            return ApiResponse::error(
                'Validation failed',
                $e->errors(),
                422
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Authentication Error (401)
        |--------------------------------------------------------------------------
        */
        $exceptions->render(function (
            AuthenticationException $e,
            $request
        ) {
            return ApiResponse::error(
                'Unauthenticated',
                null,
                401
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Too Many Requests (429)
        |--------------------------------------------------------------------------
        */
        $exceptions->render(function (
            ThrottleRequestsException $e,
            $request
        ) {
            $retryAfter = $e->getHeaders()['Retry-After'] ?? 60;

            return ApiResponse::error(
                "Too many requests. Try again after {$retryAfter} seconds.",
                null,
                429
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Record Not Found (404)
        |--------------------------------------------------------------------------
        */
        $exceptions->render(function (
            ModelNotFoundException $e,
            $request
        ) {
            return ApiResponse::error(
                'Record not found',
                null,
                404
            );
        });

        /*
        |--------------------------------------------------------------------------
        | General Error (500)
        |--------------------------------------------------------------------------
        */
        $exceptions->render(function (
            \Throwable $e,
            $request
        ) {

            if (config('app.debug')) {

                return ApiResponse::error(
                    $e->getMessage(),
                    [
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                    ],
                    500
                );
            }

            return ApiResponse::error(
                'Internal Server Error',
                null,
                500
            );
        });

    })

    ->create();