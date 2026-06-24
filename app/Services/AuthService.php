<?php

namespace App\Services;

use App\Models\User;
use App\Models\BranchStore as SysBranch;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $credentials)
    {
        $user = User::where(
            'email',
            strtolower(trim($credentials['email']))
        )->first();

        if (
            !$user ||
            !Hash::check(
                $credentials['password'],
                $user->password
            )
        ) {
            return ApiResponse::error(
                'Invalid email or password',
                null,
                401
            );
        }

        $token = $user
            ->createToken('api-token')
            ->accessToken;

        $branch = SysBranch::where('branchcode', $user->branchcode)->first();

        return ApiResponse::success([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'user_id' => $user->user_id,
                'profile_id' => $user->profile_id,
                'email' => $user->email,
                'branchcode' => $user->branchcode,
            ],
            'branch' => [

                'branchcode'  => $branch?->branchcode,
                'branch_name' => $branch?->branch_name,
                'system_id'   => $branch?->system_id,   

            ]

        ], 'Login successful');
    }

    public function register(array $data)
    {
        DB::beginTransaction();
        try {

            $user = User::create([
                'user_id' => $this->generateUserId(),
                'name' => trim($data['name']),
                'email' => strtolower(trim($data['email'])),
                'password' => Hash::make($data['password']),
                'isactive' => true
            ]);

            $token = $user
                ->createToken('api-token')
                ->accessToken;

            DB::commit();

            return ApiResponse::success([
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'user_id' => $user->user_id,
                    'profile_id' => $user->profile_id,
                    'email' => $user->email,
                ],

                'branch' => [
                    'branchcode' => $user->branchcode,
                    'branchname' => $user->email,
                ]

            ], 'Account created successfully', 201);
        } catch (\Exception $e) {

            DB::rollBack();

            return ApiResponse::error(
                'Registration failed',
                config('app.debug')
                    ? $e->getMessage()
                    : null,
                500
            );
        }
    }

    public function profile($user)
    {
        return ApiResponse::success([
            'id' => $user->id,
            'user_id' => $user->user_id,
            'name' => $user->name,
            'email' => $user->email,
        ], 'Profile loaded successfully');
    }

    public function logout($user)
    {
        $user->token()->revoke();

        return ApiResponse::success(
            null,
            'Logout successful'
        );
    }

    private function generateUserId()
    {
        return 'USR' . date('YmdHis') . rand(100, 999);
    }
}
