<?php

namespace App\Services;

use App\Helpers\ApiResponse;
use App\Models\Api\SqlModel;

class ComboService
{
    public function __construct(
        private SqlModel $sqlModel
    ) {}

    public function getCombo(string $status)
    {
        try {

            $results = $this->sqlModel->proc_get_data(
                'CALL gb_get_combo(?,?,?)',
                [
                    $status,
                    '',
                    ''
                ]
            );

            return ApiResponse::success(
                $results,
                'Data retrieved successfully.'
            );

        } catch (\Exception $e) {

            return ApiResponse::error(
                'Failed to retrieve data.',
                config('app.debug')
                    ? $e->getMessage()
                    : null,
                500
            );
        }
    }
}