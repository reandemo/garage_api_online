<?php

namespace App\Services;

use App\Helpers\ApiResponse;
use App\Models\User;
use App\Models\Api\SqlModel;
use App\Models\BranchStore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreService
{
    public function registerStore(array $data)
    {
        DB::beginTransaction();

        try {

            $sqlModel = new SqlModel();

            $branchCode = $sqlModel->generateBranchCode();

            BranchStore::create([

                'branchcode' => $branchCode,

                'branch_name' =>
                    strtoupper(trim($data['store_name'])),

                'system_id' =>
                    strtoupper(trim($data['system_id'])),

                'phone' =>
                    trim($data['phone']),

                'location_code' =>
                    strtoupper(trim($data['location_code'])),

                'subofbranch' => $branchCode,

                'main_branch' => true,

                'status' => true,

                'active' => true,

                'inputter' =>
                    strtolower(trim($data['username'])),

                'created_by' =>
                    strtolower(trim($data['username']))
            ]);

            User::create([

                'user_id' =>
                    $sqlModel->generateUserId(),

                'branchcode' =>
                    $branchCode,

                'user_login' =>
                    strtolower(trim($data['username'])),

                'email' =>
                    strtolower(trim($data['username'])),

                'password' =>
                    Hash::make($data['password']),

                'disable' => false
            ]);

            DB::commit();

            return ApiResponse::success([

                'branch_code' => $branchCode,

                'username' =>
                    strtolower(trim($data['username']))
            ],
            'Store created successfully',
            201);

        } catch (\Exception $e) {

            DB::rollBack();

            return ApiResponse::error(
                'Store registration failed',
                config('app.debug')
                    ? $e->getMessage()
                    : null,
                500
            );
        }
    }
}