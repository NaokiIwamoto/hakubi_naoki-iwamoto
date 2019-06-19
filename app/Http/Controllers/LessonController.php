<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use App\Lesson;
use App\Answer;
use App\LearnedWord;
use App\Option;

class LessonController extends Controller
{
    public function lesson_create($category_id, $difficulty)
    {
        $lesson = Lesson::firstOrCreate([
            'category_id' => $category_id,
            'user_id' => auth()->user()->id,
            'difficulty' => $difficulty
        ]);

        if ($lesson->wasRecentlyCreated) {
            return redirect()->route('lesson_show', ['lesson_id' => $lesson->id, 'index' => 0]);
        } else {
            return redirect()->route('lesson_result', ['lesson_id' => $lesson->id]);
        }
    }

    public function lesson_show($lesson_id, $index)
    {
        $lesson = Lesson::find($lesson_id);
        $words = Word::where('category_id', $lesson->category_id)->where('difficulty', $lesson->difficulty)->get();
        $word = $words[$index];
        $options = $word->options_word_id()->get()->shuffle();

        return view('user.lesson.lesson', compact('word', 'options', 'index', 'lesson'));
    }

    public function lesson_answer($lesson_id, $index, $option_id)
    {
        $lesson = Lesson::find($lesson_id);
        $option = Option::find($option_id);
        Answer::Create([
            'lesson_id' => $lesson->id,
            'option_id' => $option->id
        ]);

        LearnedWord::Create([
            'word_id' => $option->word_id,
            'user_id' => auth()->user()->id
        ]);

        $index += 1;

        $words = Word::where('category_id', $lesson->category_id)->where('difficulty', $lesson->difficulty)->get();
        if (count($words) > $index) {
            return redirect()->route('lesson_show', ['lesson_id' => $lesson->id, 'index' => $index]);
        } else {
            return redirect()->route('lesson_result', ['lesson_id' => $lesson->id]);
        }
    }

    public function lesson_result($lesson_id)
    {
        $answers = Answer::where('lesson_id', $lesson_id)->get();

        return view('user.lesson.lesson_result', compact('answers'));
    }

    public function learned_words($user_id)
    {
        $learned_words = LearnedWord::where('user_id', $user_id)->get();

        return view('user.learned_words', compact('learned_words'));
    }
}
