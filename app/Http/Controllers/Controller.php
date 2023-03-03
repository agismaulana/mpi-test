<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendError($data = [], $http_code_response = 404){
        return response()->json([
            'message' => $data,
            'status'  => false
        ], $http_code_response);
    }

    public function sendSuccess($data = [], $http_code_response = 200)
    {
        if(getType($data) == 'string'){
            return response()->json([
                'message'   => $data,
                'status'    => true
            ] ,$http_code_response);
        }

        $data['status'] = true;
        return response()->json($data, $http_code_response);
    }
}
