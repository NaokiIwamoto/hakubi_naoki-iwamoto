<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'category_id', 'user_id', 'difficulty',
    ];
}
