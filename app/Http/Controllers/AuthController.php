<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login functionality and store the user login info
    public function login(Request $request)
    {
        if (auth()->check()) {
            if (auth()->user()->status != "approved") {
                auth()->logout();
                return response()->json(['error' => 'Unauthorized user, please ask the db admin to approve your account!'], 401);
            } else {
                return response()->json([
                    'has_logged_in' => true,
                    'api_token' => Auth::user()->api_token,
                    'role' => auth()->user()->role
                ]);
            }
        }

        // Validating request form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized user, please login with proper email and password'], 401);
        }

        if (Auth::user()->status != "approved") {
            Auth::logout();
            return response()->json(['error' => 'Unauthorized user, please ask the db admin to approve your account!'], 401);
        }

        // Generating new token
        $token = Str::random(60);
        Auth::user()->update(['api_token' => $token]);

        return response()->json([
            'api_token' => Auth::user()->api_token,
            'role' => Auth::user()->role
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['msg' => 'Logout success']);
    }
}
