<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use SoftDeletes;

class BranchStore extends Model
{
    //

    protected $table = 'sys_branches';

    protected $primaryKey = 'branchcode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [

        'branchcode',

        'branch_name',

        'system_id',

        'phone',

        'location_code',

        'address',

        'logo',

        'status',

        'created_by',

        'updated_by',

        'subofbranch',

        'main_branch',

        'short_name',

        'comment',

        'active',

        'slogan',

        'inputter'

    ];
}
