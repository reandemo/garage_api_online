<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_products';

    protected $primaryKey = 'id';

    protected $fillable = [

        'product_code',
        'product_name',
        'barcode',

        'cost',
        'price',

        'qty',

        'branchcode',

        'status',

        'created_by',
        'updated_by'
    ];
}