<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login functionality, and store the user login info.
    public function login() {
        //Checking user logged in
        if (auth()->check()) {
            if (auth()->user()->status != "approved") {
                auth()->logout();
            } else {
                return $response = [
                    'has_logged_in' => true,
                    'api_token' => Auth::user()->api_token,
                    'role' => auth()->user()->role
                ];
            }
        }
        
        //Generating new token
        $token = Str::random(60);

        //Validating request form
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $email = request('email');
        $password = request('password');

        $auth = Auth::attempt(['email' => $email, 'password' => $password]);
        
        if (!$auth)
            abort(401, 'unauthorized user, please login with proper email and password');
        
        
        if(Auth::user()->status != "approved") {
            Auth::logout();
            abort(401, 'unauthorized user, please ask the db admin to approve your account!');
        }

        //Inserting new token
        $admin = Admin::where('id', Auth::user()->id)->update([
            'api_token' => $token
        ]);

        $auth = Admin::where('id', Auth::user()->id)->first();
        $response = [
            'api_token' => $auth->api_token,
            'role' => $auth->role
        ];
        return $response;
    }

    public function logout(){
        Auth::logout();
        return ['msg' => "logout success"];
    }
}
