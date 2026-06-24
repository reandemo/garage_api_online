<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\BranchStore;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __construct(
        private StoreService $storeService
    ) {}

    /**
     * Dashboard Test
     */
    public function index()
    {
        $totalBranches = BranchStore::count();

        $branches = BranchStore::latest()
            ->take(10)->where('isactive', true)
            ->get();

        return view(
            'welcome',
            compact(
                'branches',
                'totalBranches'
            )
        );
    }

    /**
     * Register Store
     */
    public function registerStore(
        StoreRegisterRequest $request
    ) {
        return $this->storeService
            ->registerStore(
                $request->validated()
            );
    }

    /**
     * Get Store Information
     */
    public function storeInfo($branchcode)
    {
        try {

            $branch = BranchStore::where(
                'branchcode',
                $branchcode
            )->first();

            if (!$branch) {

                return response()->json([
                    'success' => false,
                    'message' => 'Store not found.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $branch
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update Store Information
     */
    public function updateStore(
        Request $request,
        $branchcode
    ) {
        $validator = Validator::make(
            $request->all(),
            [
                'branch_name' => 'required|max:200',
                'phone' => 'nullable|max:50',
                'address' => 'nullable|max:255',
                'slogan' => 'nullable|max:255',
                'short_name' => 'nullable|max:50'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            $branch = BranchStore::where(
                'branchcode',
                $branchcode
            )->first();

            if (!$branch) {

                return response()->json([
                    'success' => false,
                    'message' => 'Store not found.'
                ], 404);
            }

            $branch->update([

                'branch_name' => trim($request->branch_name),

                'phone' => trim($request->phone),

                'address' => trim($request->address),

                'slogan' => trim($request->slogan),

                'short_name' => trim($request->short_name),

                'updated_by' => auth()->user()->user_login ?? 'system'
            ]);

            return response()->json([

                'success' => true,

                'message' => 'Store updated successfully.'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Upload Store Logo
     */
    public function uploadLogo(
        Request $request,
        $branchcode
    ) {
        $validator = Validator::make(
            $request->all(),
            [
                'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            $branch = BranchStore::where(
                'branchcode',
                $branchcode
            )->first();

            if (!$branch) {

                return response()->json([
                    'success' => false,
                    'message' => 'Store not found.'
                ], 404);
            }

            if (
                $branch->logo &&
                Storage::disk('public')->exists($branch->logo)
            ) {
                Storage::disk('public')
                    ->delete($branch->logo);
            }

            $file = $request->file('logo');

            $fileName =
                $branchcode .
                '_' .
                time() .
                '.' .
                $file->getClientOriginalExtension();

            $path = $file->storeAs(
                'branch-logo',
                $fileName,
                'public'
            );

            $branch->logo = $path;

            $branch->save();

            return response()->json([

                'success' => true,

                'message' => 'Logo uploaded successfully.',

                'data' => [

                    'logo' => $path,

                    'url' => asset(
                        'storage/' . $path
                    )

                ]

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }
}
