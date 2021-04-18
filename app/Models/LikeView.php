<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeView extends Model
{
    use HasFactory;

    protected $table = "like_views";

    public function Product () {
        return $this->beLongsTo('App\Product', 'likeViewID', 'id');
    }

    public function News () {
        return $this->beLongsTo('App\News', 'likeViewID', 'id');
    }
}
