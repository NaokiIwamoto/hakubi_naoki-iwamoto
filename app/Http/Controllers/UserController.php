<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FromSendRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Auth;

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

    public function edit_profile()
    {
        $user = Auth::user();
        return view('user.edit_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $request->photo->storeAs('public/images', Auth::id() . '.jpg');

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->save();

        return redirect('/home');
    }
}
