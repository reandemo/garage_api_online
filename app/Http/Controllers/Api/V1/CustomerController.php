<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Customer List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        try {

            $query = Customer::query();

            if ($request->filled('search')) {

                $query->where(
                    'customer_name',
                    'like',
                    '%' . $request->search . '%'
                );
            }

            return response()->json([

                'success' => true,

                'data' => $query
                    ->orderBy('customer_name')
                    ->paginate(20)

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ],500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Create Customer
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'customer_name' => 'required|max:255',

                'phone' => 'nullable|max:50',

                'email' => 'nullable|email|max:255'
            ]
        );

        if ($validator->fails()) {

            return response()->json([

                'success' => false,

                'errors' => $validator->errors()

            ],422);
        }

        try {

            $customer = Customer::create([

                'customer_code' =>
                    'CUS' . date('ymdHis'),

                'customer_name' =>
                    trim($request->customer_name),

                'phone' =>
                    trim($request->phone),

                'email' =>
                    trim($request->email),

                'gender' =>
                    trim($request->gender),

                'address' =>
                    trim($request->address),

                'branchcode' =>
                    $request->branchcode,

                'active' =>
                    true
            ]);

            return response()->json([

                'success' => true,

                'message' => 'Customer created successfully.',

                'data' => $customer

            ],201);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ],500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Customer Details
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {

                return response()->json([

                    'success' => false,

                    'message' => 'Customer not found.'

                ],404);
            }

            return response()->json([

                'success' => true,

                'data' => $customer

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ],500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Customer
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    )
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {

                return response()->json([

                    'success' => false,

                    'message' => 'Customer not found.'

                ],404);
            }

            $customer->update([

                'customer_name' =>
                    trim($request->customer_name),

                'phone' =>
                    trim($request->phone),

                'email' =>
                    trim($request->email),

                'gender' =>
                    trim($request->gender),

                'address' =>
                    trim($request->address)
            ]);

            return response()->json([

                'success' => true,

                'message' => 'Customer updated successfully.'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ],500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Customer
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {

                return response()->json([

                    'success' => false,

                    'message' => 'Customer not found.'

                ],404);
            }

            $customer->delete();

            return response()->json([

                'success' => true,

                'message' => 'Customer deleted successfully.'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ],500);
        }
    }
}
