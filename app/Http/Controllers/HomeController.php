<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\LearnedWord;
use Illuminate\Support\Facades\Storage;


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
            return redirect()->route('user_home');
        }
    }

    public function user_home()
    {
        $learned = auth()->user()->userGetLearned()->count();
        $categories = Category::get();
        return view('home', compact('categories', 'learned'));
    }
}
