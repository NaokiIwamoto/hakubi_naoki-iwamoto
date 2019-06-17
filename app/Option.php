<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'word_id', 'option_name', 'true_or_false',
    ];
}
