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
    private function validateAdminData(Request $request, $id = null)
    {
        $uniqueEmailRule = $id ? Rule::unique('admins')->ignore($id) : 'unique:admins';
        $uniqueUsernameRule = $id ? Rule::unique('admins')->ignore($id) : 'unique:admins';

        return $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', $uniqueEmailRule],
            'username' => ['required', 'string', $uniqueUsernameRule],
            'password' => $id ? ['nullable', 'string', 'min:8'] : ['required', 'string', 'min:8'],
            'status' => ['nullable', 'string'],
        ]);
    }

    public function retrieve() 
    {
        return Auth::user();
    }

    public function retrieveAll() 
    {
        return Admin::all();
    }

    public function register() 
    {
        $validatedData = $this->validateAdminData(request());

        $adminData = array_merge($validatedData, [
            'password' => bcrypt(request('password')),
            'api_token' => Str::random(60),
            'status' => 'registered',
            'role' => 'admin'
        ]);

        $admin = Admin::create($adminData);
        return [
            "data" => $admin,
            "msg" => "Successfully registered your account. Please ask the DB admin to approve it."
        ];
    }

    public function update() 
    {
        $admin = Auth::user();
        $validatedData = $this->validateAdminData(request(), $admin->id);

        $admin->update($validatedData);

        return [
            "user" => [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'api_token' => $admin->api_token
            ]
        ];
    }

    public function changePassword() 
    {
        $admin = Auth::user();
        request()->validate([
            'password' => ['required', 'min:8']
        ]);

        $admin->update(['password' => bcrypt(request('password'))]);

        return [
            "user" => [
                'password_updated' => $admin->wasChanged()
            ]
        ];
    }

    public function changeStatus($id) 
    {
        $admin = Auth::user();
        if ($admin->role != "db_admin" || $admin->id == $id) {
            abort(401, "Unauthorized user. Can't change the status of this account.");
        }

        $targetAdmin = Admin::findOrFail($id);
        request()->validate(['status' => ['required', 'string']]);

        $targetAdmin->update(['status' => request('status')]);

        return ["admin_status" => $targetAdmin->status];
    }
}
