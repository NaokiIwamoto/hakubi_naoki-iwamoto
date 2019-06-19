<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FromSendRequest;
use Illuminate\Support\Facades\Auth;
use Image;

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

    public function update_profile(FromSendRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->save();

        return redirect('/home');
    }

    public function edit_icon()
    {
        $user = Auth::user();
        return view('user.edit_icon', compact('user'));
    }

    public function update_icon(Request $request)
    {
        $icon = $request->icon;
        $filename = time() . '.' . $icon->getClientOriginalExtension();
        request()->icon->move(public_path('/images/account/'), $filename);

        $user = Auth::user();
        $user->icon = $filename;
        $user->save();

        return redirect('/home');
    }
}
