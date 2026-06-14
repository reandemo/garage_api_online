<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

private function generateUserId()
{

    $lastUser = User::orderBy('id', 'desc')->first();
    if (!$lastUser) {
        return 'USR00011';
    }
    $number = (int) substr($lastUser->user_id, 3);
    $number++;
    return 'USR' . str_pad($number, 2, '0', STR_PAD_LEFT);
}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            'string',
            'max:100'
        ],

        'email' => [

            'required',
            'email',
            'max:255',
            'unique:users,email'
        ],

        'password' => [
            'required',
            'string',
            'min:8',
        ]
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
        ], 422);

    }

    DB::beginTransaction();

   
    try {

        $user = User::create([
            'user_id' => $this->generateUserId(),
            'name'      => trim($request->name),
            'email'     => strtolower(trim($request->email)),
            'password'  => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->accessToken;

        DB::commit();

        return response()->json([

            'success' => true,

            'message' => 'Account created successfully.',

            'data' => [

                'id' => $user->id,

                'name' => $user->name,

                'email' => $user->email,

                'token' => $token

            ]

        ], 201);

    } catch (\Exception $e) {

        DB::rollBack();

        return response()->json([

            'success' => false,

            'message' => 'Registration failed.',

            'error' => config('app.debug') ? $e->getMessage() : null

        ], 500);

    }
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->accessToken;

        return response()->json([
            'token' => $token,
            'userinfo' => $user
        ]);
    }


    
public function userloigin(Request $request)
{
        // 1. Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Attempt to log the user in
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $tokenResult = $user->createToken('desktop-app');
        return response()->json([
            'token_result' => $tokenResult,
            'token' => $tokenResult->plainTextToken,

        ],200);
 
    }


}
