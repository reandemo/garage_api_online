<?php

namespace App\Exceptions;

use Throwable;
use App\Helpers\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks.
     */
    public function register(): void
    {
        /**
         * Validation Error (422)
         */
        $this->renderable(function (
            ValidationException $e,
            $request
        ) {
            return ApiResponse::error(
                'Validation failed',
                $e->errors(),
                422
            );
        });

        /**
         * Authentication Error (401)
         */
        $this->renderable(function (
            AuthenticationException $e,
            $request
        ) {
            return ApiResponse::error(
                'Unauthenticated',
                null,
                401
            );
        });

        /**
         * Rate Limit Error (429)
         */
        $this->renderable(function (
            ThrottleRequestsException $e,
            $request
        ) {
            return ApiResponse::error(
                'Too many requests. Please try again later.',
                null,
                429
            );
        });

        /**
         * Record Not Found (404)
         */
        $this->renderable(function (
            ModelNotFoundException $e,
            $request
        ) {
            return ApiResponse::error(
                'Record not found',
                null,
                404
            );
        });

        /**
         * General Server Error (500)
         */
        $this->renderable(function (
            Throwable $e,
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
    }
}