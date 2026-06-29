<?php

namespace App\Services;

use App\Models\BranchStore;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BranchLogoService
{
    /**
     * Audit Log Service
     */
    private AuditLogService $auditLogService;

    /**
     * Constructor
     */
    public function __construct(
        AuditLogService $auditLogService
    ) {
        $this->auditLogService = $auditLogService;
    }

    /**
     * Upload Branch Logo
     */
    public function upload(Request $request, string $branchcode): array
    {
        $validator = Validator::make($request->all(), [
            'logo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
                'dimensions:min_width=200,min_height=200'
            ]
        ]);

        if ($validator->fails()) {

            return [
                'success' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors(),
                'status' => 422
            ];

        }

        $branch = BranchStore::where(
            'branchcode',
            $branchcode
        )->first();

        if (!$branch) {

            return [
                'success' => false,
                'message' => 'Store not found.',
                'data' => null,
                'status' => 404
            ];

        }

        $file = $request->file('logo');

        if (!$file || !$file->isValid()) {

            return [
                'success' => false,
                'message' => 'Invalid upload file.',
                'data' => null,
                'status' => 400
            ];

        }

        DB::beginTransaction();

        try {

            $disk = Storage::disk('public');

            /**
             * Save Old Data
             */
            $oldData = [
                'logo' => $branch->logo
            ];

            $logoFolder = "branch-logo/{$branchcode}";

            $archiveFolder = sprintf(
                "archive-logo/%s/%s/%s",
                $branchcode,
                now()->format('Y'),
                now()->format('m')
            );

            /**
             * Archive old logo
             */
            if (!empty($branch->logo) && $disk->exists($branch->logo)) {

                if (!$disk->exists($archiveFolder)) {
                    $disk->makeDirectory($archiveFolder);
                }

                $archiveName = sprintf(
                    "%s_%s",
                    now()->format('YmdHis'),
                    basename($branch->logo)
                );

                $disk->move(
                    $branch->logo,
                    "{$archiveFolder}/{$archiveName}"
                );
            }

            /**
             * Delete unexpected files
             */
            if ($disk->exists($logoFolder)) {

                foreach ($disk->files($logoFolder) as $oldFile) {
                    $disk->delete($oldFile);
                }

            }

            /**
             * Store New Logo
             */
            $fileName = sprintf(
                "%s_%s.%s",
                now()->format('YmdHis'),
                bin2hex(random_bytes(8)),
                $file->extension()
            );

            $path = $file->storeAs(
                $logoFolder,
                $fileName,
                'public'
            );

            /**
             * Update Database
             */
            $branch->update([
                'logo'       => $path,
                'updated_by' => auth()->user()->user_login ?? 'system'
            ]);

            /**
             * Save New Data
             */
            $newData = [
                'logo' => $path
            ];

            /**
             * Write Audit Log
             */
            $this->auditLogService->log(

                module: 'Store',

                table: 'sys_branches',

                recordId: $branch->branchcode,

                action: 'UPLOAD',

                oldData: $oldData,

                newData: $newData,

                remarks: 'Branch logo uploaded.'
            );

            DB::commit();

            return [
                'success' => true,
                'message' => 'Logo uploaded successfully.',
                'data' => [
                    'branchcode' => $branch->branchcode,
                    'logo'       => $path,
                    'url'        => asset("storage/{$path}")
                ],
                'status' => 200
            ];

        } catch (Exception $e) {

            DB::rollBack();

            if (
                isset($path) &&
                Storage::disk('public')->exists($path)
            ) {
                Storage::disk('public')->delete($path);
            }

            return [
                'success' => false,
                'message' => 'Upload failed.',
                'data' => $e->getMessage(),
                'status' => 500
            ];

        }
    }
}