<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'word_id', 'option_name', 'correct_answer', 'true_or_false',
    ];

    public function optionGetWord()
    {
        return $this->belongsTo('App\Word', 'word_id', 'id');
    }
}
