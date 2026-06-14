<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\SqlModel;

class BranchesController extends BaseController
{
    protected SqlModel $sqlModel;

    public function __construct(SqlModel $sqlModel)
    {
        $this->sqlModel = $sqlModel;
    }

    public function create_branch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'      => 'required',
            'branch_code' => 'required|string|max:20',
            'branch_name' => 'required|string|max:255',
            'short_name'  => 'nullable|string|max:100',
            'slogan'      => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:50',
            'address'     => 'nullable|string|max:500',
            'comments'    => 'nullable|string',
            'active'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {

            $context = $this->sqlModel->getUserContext();

            $results = $this->sqlModel->proc_get_data(
                'CALL proc_add_branch(?,?,?,?,?,?,?,?,?,?,?,?)',
                [
                    $request->status,
                    $request->branch_code,
                    $context['subofbranch'],
                    $request->branch_name,
                    $request->short_name,
                    $request->slogan,
                    $request->phone,
                    $request->address,
                    $context['system_id'],
                    $request->comments,
                    $request->active,
                    $context['email']
                ]
            );

            return $this->sendResponse(
                $results,
                'Branch created successfully.'
            );

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to create branch.',
                'error'   => config('app.debug')
                    ? $e->getMessage()
                    : null
            ], 500);
        }
    }
}