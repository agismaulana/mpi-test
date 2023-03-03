<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function api(Request $request) {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->sendError(__('Email / Password is not correct'), Response::HTTP_FORBIDDEN);
        }

        return response()->json([
            'status' => 1,
            'user_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

    public function web() {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->sendError(__('Email / Password is not correct'), Response::HTTP_FORBIDDEN);
        }

        return redirect('/')->with(['message' => 'Login Successfully']);
    }
}
