<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Word;
use App\Http\Requests\WordRequest;

class WordController extends Controller
{
    public function words_admin($id)
    {
        $category = Category::find($id);
        $words = Word::where('category_id', $id)->get();
        if (count($words) == 0) {
            return redirect()->route('add_word_admin', ['id' => $id]);
        } else {
            return view('admin.admin_words', compact('words', 'category'));
        }
    }

    public function add_word_admin($id)
    {
        $category = Category::find($id);
        return view('admin.add_word', compact('category'));
    }

    public function store_word_admin($id, WordRequest $request)
    {
        Word::create([
            'category_id' => $id,
            'japanese' => $request['japanese'],
            'difficulty' => $request['difficulty'],
            'explain' => $request['explain']
        ]);

        $request->session()->regenerateToken();

        return redirect()->route('words_admin', ['id' => $id]);
    }

    public function edit_word_admin($word_id)
    {
        $word = Word::find($word_id);
        return view('admin.edit_word', compact('word'));
    }

    public function update_word_admin($word_id,  WordRequest $request)
    {
        $word = Word::find($word_id);
        $word->japanese = $request->input('japanese');
        $word->explain = $request->input('explain');
        $word->difficulty = $request->input('difficulty');
        $word->save();

        return redirect()->route('words_admin', ['id' => $word->category_id]);
    }

    public function delete_word_admin($word_id)
    {
        $word = Word::find($word_id);
        $word->delete();

        return back();
    }
}
