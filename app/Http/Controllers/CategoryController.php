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
            return redirect()->route('add_category_admin');
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

    public function edit_category_admin($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }

    public function update_category_admin($id, Request $request)
    {
        $category = Category::find($id);
        $category->category = $request->input('category');
        $category->edit_user_id = auth()->user()->id;
        $category->describe = $request->input('describe');
        $category->save();

        return redirect()->route('open_category_admin');
    }

    public function delete_category_admin($id)
    {
        $category = Category::find($id);
        $category->delete();

        return back();
    }

    public function words_admin($id)
    {
        $category = Category::find($id);
        $words = $id->words_category_id()->get();
        if ($words == 0) {
            return redirect()->route('add_word_admin', ['id' => $id]);
        } else {
            return view('admin.admin_words', compact('words', 'category'));
        }
    }

    public function add_word_admin($id)
    {
        //
    }
}
