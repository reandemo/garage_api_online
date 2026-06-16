<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success(
        $data = null,
        $message = 'Success',
        $code = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'errors' => null,
            'timestamp' => now()
        ], $code);
    }

    public static function error(
        $message = 'Error',
        $errors = null,
        $code = 500
    ) {
        return response()->json([
            'success' => false,
            'message' => $message,
            'code' => $code,
            'data' => null,
            'errors' => $errors,
            'timestamp' => now()
        ], $code);
    }
}
