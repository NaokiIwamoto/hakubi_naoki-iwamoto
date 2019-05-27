<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< 4b32180afca8919e6d86978c7bbca9405cc4035c
        if (auth()->user()->admin == True) {
            return view('admin.admin_home');
        } else {
            return view('home');
        }
=======
        return view('home');
>>>>>>> register/login
    }
}
