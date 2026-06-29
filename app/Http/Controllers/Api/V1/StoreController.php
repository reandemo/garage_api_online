<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\BranchStore;
use App\Services\StoreService;
use App\Services\BranchLogoService;
use Exception;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Store Service
     */
    private StoreService $storeService;

    /**
     * Branch Logo Service
     */
    private BranchLogoService $logoService;

    /**
     * Constructor
     */
    public function __construct(
        StoreService $storeService,
        BranchLogoService $logoService
    ) {
        $this->storeService = $storeService;
        $this->logoService  = $logoService;
    }

    /**
     * Dashboard
     */
    public function index()
    {
        $totalBranches = BranchStore::count();

        $branches = BranchStore::latest()
            ->where('isactive', true)
            ->take(10)
            ->get();

        return view(
            'welcome',
            compact('branches', 'totalBranches')
        );
    }

    /**
     * Register Store
     */
    public function registerStore(StoreRegisterRequest $request)
    {
        return $this->storeService->registerStore(
            $request->validated()
        );
    }

    /**
     * Store Information
     */
    public function storeInfo(string $branchcode)
    {
        try {

            $branch = BranchStore::where(
                'branchcode',
                $branchcode
            )->first();

            if (!$branch) {
                return ApiResponse::error(
                    'Store not found.',
                    null,
                    404
                );
            }

            return ApiResponse::success(
                $branch,
                'Store information.'
            );

        } catch (Exception $e) {

            return ApiResponse::error(
                $e->getMessage(),
                null,
                500
            );
        }
    }

    /**
     * Update Store
     */
    public function updateStore(
        Request $request,
        string $branchcode
    ) {
        return $this->storeService->updateStore(
            $request,
            $branchcode
        );
    }

    /**
     * Upload Branch Logo
     */
    public function uploadLogo(
        Request $request,
        string $branchcode
    ) {
        $result = $this->logoService->upload(
            $request,
            $branchcode
        );

        if (!$result['success']) {

            return ApiResponse::error(
                $result['message'],
                $result['data'],
                $result['status']
            );
        }

        return ApiResponse::success(
            $result['data'],
            $result['message']
        );
    }
}