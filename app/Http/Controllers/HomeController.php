<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->admin == True) {
            $auth_id = Auth::user()->id;
            $admins = User::where('admin', true)->where('id', '!=', $auth_id)->get();
            return view('admin.admin_home', compact('admins'));
        } else {
            $categories = Category::get();
            return view('home', compact('categories'));
        }
    }
}
