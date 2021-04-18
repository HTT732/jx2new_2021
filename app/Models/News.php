<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'News';

    public function User () {
        return $this->beLongsTo('App\User', "newID", 'id');
    }

    public function LikeView () {
        return $this->hasOne('App\LikeView', 'likeViewID', 'id');
    }

    public function Comment () {
        return $this->hasMany('App\Comment', 'commentID', 'id');
    }
}
