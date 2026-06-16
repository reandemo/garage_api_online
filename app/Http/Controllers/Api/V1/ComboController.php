<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Services\ComboService;

class ComboController extends BaseController
{
    public function __construct(
        private ComboService $comboService
    ) {}

    public function combo(string $status)
    {
        return $this->comboService
            ->getCombo($status);
    }
}