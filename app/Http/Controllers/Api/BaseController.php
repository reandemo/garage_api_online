<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function success(
        $data = null,
        string $message = 'Success',
        int $code = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'errors' => null,
            'timestamp' => now()->toISOString(),
        ], $code);
    }

    protected function error(
        string $message = 'Error',
        $errors = null,
        int $code = 500
    ) {
        return response()->json([
            'success' => false,
            'message' => $message,
            'code' => $code,
            'data' => null,
            'errors' => $errors,
            'timestamp' => now()->toISOString(),
        ], $code);
    }

    protected function validationError(
        $errors
    ) {
        return $this->error(
            'Validation failed',
            $errors,
            422
        );
    }

    protected function unauthorized(
        string $message = 'Unauthorized'
    ) {
        return $this->error(
            $message,
            null,
            401
        );
    }

    protected function notFound(
        string $message = 'Record not found'
    ) {
        return $this->error(
            $message,
            null,
            404
        );
    }
}
