<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearnedWord extends Model
{
    protected $fillable = [
        'word_id', 'user_id',
    ];

    public function learnedwordGetWord()
    {
        return $this->belongsTo('App\Word', 'word_id', 'id');
    }
}
