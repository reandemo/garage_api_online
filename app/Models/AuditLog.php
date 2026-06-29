<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'sys_audit_logs';

    protected $fillable = [

        'module',

        'table_name',

        'record_id',

        'action',

        'old_data',

        'new_data',

        'user_login',

        'ip_address',

        'user_agent',

        'remarks'
    ];

    protected $casts = [

        'old_data'=>'array',

        'new_data'=>'array'
    ];
}