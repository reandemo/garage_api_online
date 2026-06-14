<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\BranchStore as Branch;
use App\Models\User as User;
use Illuminate\Support\Facades\Hash;
use App\Models\Api\SqlModel;

class StoreController extends Controller
{
    public function registerstore(Request $request)
    {

        $SqlModel = new SqlModel();

        $validator = Validator::make($request->all(), [

            'system_id' => [
                'required',
                'string',
                'max:100'
            ],

            'store_name' => [
                'required',
                'string',
                'max:255'
            ],

            'phone' => [
                'required',
                'string',
                'max:20'
            ],

            'location_code' => [
                'required',
                'string',
                'max:10'
            ],

            'username' => [
                'required',
                'string',
                'max:100'
            ],

            'password' => [
                'required',
                'string',
                'min:6'
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

            $branchCode = $SqlModel->generateBranchCode();

            Branch::create([

                'branchcode'     => $branchCode,
                'branch_name'    => strtoupper(trim($request->store_name)),
                'system_id'      => strtoupper($request->system_id),
                'phone'          => trim($request->phone),
                'location_code'  => strtoupper($request->location_code),

                'subofbranch'    => $branchCode,
                'main_branch'    => true,

                'status'         => true,
                'active'         => true,

                'inputter'       => trim($request->username),
                'created_by'     => trim($request->username)
            ]);

            User::create([

                'user_id'     => $SqlModel->generateUserId(),
                'branchcode'  => $branchCode,
                'user_login'  => strtolower(trim($request->username)),
                'email'  => strtolower(trim($request->username)),

                'password'    => Hash::make($request->password),

                'disable'     => false
            ]);

            DB::commit();

            return response()->json([

                'success' => true,

                'message' => 'Store created successfully.',

                'data' => [

                    'branchcode' => $branchCode,

                    'username' => $request->username
                ]

            ], 201);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([

                'success' => false,

                'message' => 'Store registration failed.',

                'error' => config('app.debug')
                    ? $e->getMessage()
                    : null

            ], 500);
        }
    }
}
