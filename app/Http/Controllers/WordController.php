<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Word;
use App\Option;
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
        $word = Word::create([
            'category_id' => $id,
            'japanese' => $request['japanese'],
            'difficulty' => $request['difficulty'],
            'explain' => $request['explain']
        ]);

        $request->session()->regenerateToken();

        return redirect()->route('add_option_admin', ['word_id' => $word->id]);
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

        return redirect()->route('edit_option_admin', ['word_id' => $word->id]);
    }

    public function delete_word_admin($word_id)
    {
        $word = Word::find($word_id);
        $word->delete();

        return back();
    }

    public function add_option_admin($word_id)
    {
        $word = Word::find($word_id);
        return view('admin.add_option', compact('word'));
    }

    public function store_option_admin($word_id, Request $request)
    {
        $word = Word::find($word_id);
        for ($i = 1; $i <= 3; $i++) {
            if ($i == 1) {
                $_result = true;
            } else {
                $_result = false;
            }
            $option = 'option' . $i;
            Option::create([
                'word_id' => $word->id,
                'correct_answer' => $request->option1,
                'option_name' => $request->$option,
                'true_or_false' => $_result
            ]);
        }

        $request->session()->regenerateToken();

        return redirect()->route('words_admin', ['id' => $word->category_id]);
    }

    public function edit_option_admin($word_id)
    {
        $word = Word::find($word_id);
        $options = $word->options_word_id()->get();

        return view('admin.edit_option', compact('options', 'word'));
    }

    public function update_option_admin($word_id,  Request $request)
    {
        $word = Word::find($word_id);
        $options = $word->options_word_id()->get();

        $i = 1;
        foreach ($options as $option) {
            $name = 'option' . $i;
            $option->correct_answer = $request->input('option1');
            $option->option_name = $request->input($name);
            $option->save();
            $i += 1;
        }

        return redirect()->route('words_admin', ['id' => $word->category_id]);
    }
}
