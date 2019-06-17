<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'japanese', 'category_id', 'difficulty', 'explain',
    ];

    public function options_word_id()
    {
        return $this->hasMany('App\Option', 'word_id', 'id');
    }
}
