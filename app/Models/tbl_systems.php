<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_systems extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_systems';

    protected $fillable = [
        'system_id',
        'name',
        'status',
        'isactive',
        'inputter',
    ];
}
