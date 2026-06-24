<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Product List
     * GET /api/v1/products
     */
    public function index(Request $request)
    {
        try {

            $query = Product::query();

            if ($request->filled('search')) {

                $query->where(
                    'product_name',
                    'like',
                    '%' . $request->search . '%'
                );
            }

            $products = $query
                ->orderBy('product_name')
                ->paginate(20);

            return response()->json([

                'success' => true,

                'data' => $products

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Create Product
     * POST /api/v1/products
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'product_code' => 'required|unique:tbl_products',

                'product_name' => 'required|max:255',

                'cost' => 'required|numeric',

                'price' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            $product = Product::create([

                'product_code' =>
                    strtoupper($request->product_code),

                'product_name' =>
                    trim($request->product_name),

                'barcode' =>
                    trim($request->barcode),

                'cost' =>
                    $request->cost,

                'price' =>
                    $request->price,

                'qty' =>
                    $request->qty ?? 0,

                'branchcode' =>
                    $request->branchcode,

                'status' =>
                    true
            ]);

            return response()->json([

                'success' => true,

                'message' => 'Product created successfully.',

                'data' => $product

            ], 201);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Product Details
     * GET /api/v1/products/{id}
     */
    public function show($id)
    {
        try {

            $product = Product::find($id);

            if (!$product) {

                return response()->json([

                    'success' => false,

                    'message' => 'Product not found.'

                ], 404);
            }

            return response()->json([

                'success' => true,

                'data' => $product

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Update Product
     * PUT /api/v1/products/{id}
     */
    public function update(
        Request $request,
        $id
    ) {
        try {

            $product = Product::find($id);

            if (!$product) {

                return response()->json([

                    'success' => false,

                    'message' => 'Product not found.'

                ], 404);
            }

            $product->update([

                'product_name' =>
                    trim($request->product_name),

                'barcode' =>
                    trim($request->barcode),

                'cost' =>
                    $request->cost,

                'price' =>
                    $request->price,

                'qty' =>
                    $request->qty
            ]);

            return response()->json([

                'success' => true,

                'message' => 'Product updated successfully.'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Delete Product
     * DELETE /api/v1/products/{id}
     */
    public function destroy($id)
    {
        try {

            $product = Product::find($id);

            if (!$product) {

                return response()->json([

                    'success' => false,

                    'message' => 'Product not found.'

                ], 404);
            }

            $product->delete();

            return response()->json([

                'success' => true,

                'message' => 'Product deleted successfully.'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }
}