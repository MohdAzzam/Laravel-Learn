<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    public function sendResponse($result, $massage)
    {
        $response=[
            'success'=>true,
            'data'=>$result,
            'massage'=>$massage
        ];
        return response()->json($response,200);
    }
    public function sendError($error ,$errorMassage=[],$code=404)
    {
        $response=[
            'success'=>false,
            'massage'=>$error,
        ];
        if(!empty($errorMassage)){
            $response['data']=$errorMassage;
        }
        return response()->json($response,$code);
    }
}
