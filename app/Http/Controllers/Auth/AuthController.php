<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class AuthController extends Controller
{
    // register tạm thời
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = [
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ];
        User::create($user);
        return dd("Sucess", $user);
    }

    // login tạm thời lấy token
    public function login(Request $request): JsonResponse
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!Auth::attempt($loginData)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials',
                'token'=>null,
                'data'=> null
            ]);
        }
        $user = Auth::user();
        $token = $user->createToken('authToken')->accessToken;
        return response()->json([
            'success' => true,
            'message' => null,
            'data' => $user,
            'token' => $token
        ]);
    }
}
