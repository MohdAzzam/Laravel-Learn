<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public  function sendResponse($result, $massage)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'massage' => $massage

        ];
        return response()->json($response , 200);
    }
    public  function sendError($error , $errorMessage=[] , $code = 404)
    {
        $response = [
            'success' => false,
            'data' => $error,
        ];
        if (!empty($errorMassage)) {
            $response['data'] = $errorMassage;
        }
        return response()->json($response, $code);
    }
}
