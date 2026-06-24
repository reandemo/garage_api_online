<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Foundation\Http\FormRequest;

class AuthController extends Controller
{
protected $authService;
public function __construct(AuthService $authService)

{

    $this->authService = $authService;

}

    public function login(LoginRequest $request)
    {
        return $this->authService->login(
            $request->validated()
        );
    }

    public function register(RegisterRequest $request)
    {
        return $request;
        return $this->authService->register(
            $request->validated()
        );
    }

    public function profile()
    {
        return $this->authService->profile(
            request()->user()
        );
    }

    public function logout()
    {
        return $this->authService->logout(
            request()->user()
        );
    }

    /**
     * Legacy Support
     */
    public function userLogin(LoginRequest $request)
    {
        return $this->login($request);
    }
}