<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FromSendRequest;

class UserController extends Controller
{
    public function open_add_admin_page()
    {
        return view('admin.admin_register');
    }
    public function admin_register(FromSendRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'admin' => true,
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/home');
    }
}
