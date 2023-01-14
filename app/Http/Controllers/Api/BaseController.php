<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    public function sendResponse($result,$message)
    {
        return response()->json([

            'success' => true,

            'data' => $result,

            'message' => $message

        ],200);

    }


    public function sendError($error , $errorMessages = [] , $code = 404)
    {
        $resp = [

            'success' => false,

            'message' => $error

        ];

        if(!empty($errorMessages)){

            $resp['data'] = $errorMessages;

        }

        return response()->json($resp,$code);

    }

}
