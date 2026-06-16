<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\BranchStore;
use App\Services\StoreService;

class StoreController extends Controller
{
    public function __construct(
        private StoreService $storeService
    ) {}
    public function index()
    {

        $totalBranches = BranchStore::count();
        $branches = BranchStore::latest()
            ->take(20)
            ->get();
        return view('welcome', compact(
            'branches',
            'totalBranches'
        ));
    }
    public function registerStore(
        StoreRegisterRequest $request
    ) {
        return $this->storeService->registerStore(
            $request->validated()
        );
    }
}
