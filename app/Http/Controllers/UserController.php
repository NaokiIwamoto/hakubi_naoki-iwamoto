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
        $admin = new User;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->admin = true;
        $admin->save();
        return redirect('/home');
    }
}
