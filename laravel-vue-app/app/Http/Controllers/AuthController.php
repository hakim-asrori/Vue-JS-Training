<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors()
            ], 403);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login success!',
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Login failed!"
                ], 403);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Login failed!"
            ], 403);
        }
    }
}
