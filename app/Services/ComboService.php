<?php

namespace App\Services;

use App\Helpers\ApiResponse;
use App\Models\Api\SqlModel;
use Illuminate\Support\Facades\DB;
use Throwable;
class ComboService
{
    public function __construct(
        private SqlModel $sqlModel
    ) {}

    /**
     * System Information
     */
    private function getSystemInfo()
    {
        $data = DB::table('tbl_systems')
            ->select(
                'system_id',
                'name',
                'isactive'
            )
            ->where('isactive', 1)
            ->get();

        return ApiResponse::success(
            $data,
            'System Information'
        );
    }

    /**
     * Country List
     */
    private function getCountry()
    {
        $data = DB::table('sys_countries')
            ->orderBy('country_name')
            ->get();

        return ApiResponse::success(
            $data,
            'Country List'
        );
    }

    /**
     * Province List
     */
    private function getProvince()
    {
        $data = DB::table('sys_provinces')
            ->orderBy('province_name')
            ->get();

        return ApiResponse::success(
            $data,
            'Province List'
        );
    }

    public function getPublicCombo(string $id)
    {
        try {

            $allowed = [
                'system_info',
                'country',
                'province'
            ];

            if (!in_array($id, $allowed)) {
                return ApiResponse::error(
                    'Invalid combo request',
                    null,
                    403
                );
            }

            return match ($id) {

                'system_info' => $this->getSystemInfo(),

                'country' => $this->getCountry(),

                'province' => $this->getProvince(),

                default => ApiResponse::error(
                    'Data not found',
                    null,
                    404
                )
            };
        } catch (Throwable $e) {

            return ApiResponse::error(
                'Failed to load combo data',
                $e->getMessage(),
                500
            );
        }
    }


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
