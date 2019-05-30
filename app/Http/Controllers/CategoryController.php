<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    public function open_category_admin()
    {
        $categories = Category::get();
        if (count($categories) == 0) {
            return redirect(route('add_category_admin'));
        } else {
            return view('admin.admin_categories', compact('categories'));
        }
    }
    public function add_category_admin()
    {
        return view('admin.add_category');
    }
    public function store_category_admin(Request $request)
    {
        Category::create([
            'category' => $request['category'],
            'describe' => $request['describe'],
            'create_user_id' => auth()->user()->id,
            'edit_user_id' => auth()->user()->id,
        ]);

        return redirect()->route('open_category_admin');
    }
}
