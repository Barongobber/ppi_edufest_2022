<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function retrieve() {
        $admin = Admin::where('id', Auth::user()->id)->first();
        return $admin;
    }

    public function retrieveAll() {
        $admins = Admin::all();
        return $admins;        
    }

    public function register() {
        //Validating request form
        request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'username' => ['required', 'string']
        ]);

        //Checking procedure of the unique attributes
        $check = Admin::where('email', request('email'))->first();
        if ($check)
            abort(400, 'The email address has already been used by another account.');

        $check = Admin::where('username', request('username'))->first();
        if ($check)
            abort(400, 'The username has already been used by another account.');


        $adminData = [
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'api_token' => Str::random(60),
            'status' => 'registered',
            'role' => 'admin'
        ];

        $admin = Admin::create($adminData);
        return [
            "data" => $admin,
            "msg" => "successfully to register your account, please ask DB admin to approve it"
        ];
    }

    public function update() {
        $admin = Auth::user();

        //Validating request form
        request()->validate([
            'name' => ['required', 'string'],
            'email' => [
                'required', 
                'string', 
                'email', 
                'nullable', 
                'max:255', 
                Rule::unique('admins')->ignore($admin->id)
            ],
            'username' => ['required', 'string']
        ]);

        $data = request()->only([
            'name',
            'email',
            'username'
        ]);

        //Updating
        $data['email'] = strtolower($data['email']);
        $admin->update($data);

        //Response
        $response = [
            // "user" => $data
            "user" => [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'api_token' => $admin->api_token
            ]
        ];
        return $response;
    }

    public function changePassword() {
        $admin = Auth::user();

        $data = request()->only([
            'password'
        ]);
        
        //Validating request form
        request()->validate([
            'password' => ['required', 'min:8']
        ]);

        //Updating
        $admin->update($data);
        $isUpdated = $admin->wasChanged();

        //Response
        $response = [
            "user" => [
                'password_updated' => $isUpdated
            ]
        ];

        return $response;
    }

    public function changeStatus($id) {
        if (Auth::user()->role != "db_admin" || Auth::user()->id == $id)
            abort(401, "Unauthorized user, can\'t use this account to change the status of other\'s account");
        $admin = Admin::where('id', $id)->first();

       
        request()->validate([
            'status' => ['string', 'required']
        ]); 
        $changeStatus = request()->only([
            'status'
        ]); 
        $admin->update($changeStatus);
        $response = [
            "admin_status" => $admin->status
        ];
        
        return $response;     
    }
}