<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        return $this->authService->login(
            $request->validated()
        );
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register(
            $request->validated()
        );
    }

    public function profile()
    {
        return $this->authService->profile(
            auth()->user()
        );
    }

    public function logout()
    {
        return $this->authService->logout(
            auth()->user()
        );
    }

    // Legacy
    public function userLogin(LoginRequest $request)
    {
        return $this->login($request);
    }
}