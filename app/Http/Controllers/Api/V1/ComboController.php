<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\BaseController;
use App\Services\ComboService;
use Illuminate\Support\Facades\DB;
use Throwable;

class ComboController extends BaseController
{
    public function __construct(
        private ComboService $comboService
    ) {}

    /**
     * Protected Combo
     */
    public function combo(string $status)
    {
        return $this->comboService->getCombo($status);
    }

    /**
     * Public Combo
     */
    public function publicCombo(string $id)
    {

        return $this->comboService->getPublicCombo($id);
    }
}
