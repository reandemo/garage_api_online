<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public function loginerror($result, $message)
    {
    	$response = [
            'success' => false,
            'errors'    => $message,
            'message' => $message,
            'statusCode' =>'404'
        ];
        return response()->json($response, 200);
    }
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'statusCode' =>'200'
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
            'statusCode'=> $code
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function sendResponseFile($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'statusCode' =>'200'
        ];
        return response()->json($response, 200);
    }

}
