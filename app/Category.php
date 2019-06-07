<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    protected $fillable = [
        'category', 'describe', 'create_user_id', 'edit_user_id',
    ];

    public function words_category_id()
    {
        return $this->belongsToMany('App\Category', 'words', 'category_id');
    }
}
