<?php

namespace App\Traits;

trait HttpResponse {

    protected function success ($result,$message)
    {
        return response()->json([

            'success' => true,

            'data' => $result,

            'message' => $message

        ],200);
    }

    protected function error($error , $errorMessages = [] , $code = 404)
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