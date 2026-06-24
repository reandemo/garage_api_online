<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return response()->json([

            'success' => true,

            'data' => [

                'total_products' =>
                    Product::count(),

                'total_customers' =>
                    Customer::count(),

                'total_users' =>
                    User::count()
            ]

        ]);
    }
}