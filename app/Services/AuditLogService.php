<?php

namespace App\Services;

use App\Models\AuditLog;

class AuditLogService
{
    public function log(

        string $module,

        string $table,

        string $recordId,

        string $action,

        ?array $oldData = null,

        ?array $newData = null,

        ?string $remarks = null

    ): void {

        AuditLog::create([

            'module'      => $module,

            'table_name'  => $table,

            'record_id'   => $recordId,

            'action'      => strtoupper($action),

            'old_data'    => $oldData,

            'new_data'    => $newData,

            'user_login'  => auth()->user()->user_login ?? 'system',

            'ip_address'  => request()->ip(),

            'user_agent'  => request()->userAgent(),

            'remarks'     => $remarks
        ]);
    }
}