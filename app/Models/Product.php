<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function User () {
        return $this->beLongsTo('App\Models\User', 'userID', 'id');
    }

    public function Image () {
        return $this->hasMany('App\Models\Image', 'productID', 'id');
    }

    public function LikeView () {
        return $this->hasOne('App\Models\LikeView', 'productID', 'id');
    }

    public function ServerGame () {
        return $this->beLongsTo('App\Models\ServerGame', 'serverGameID', 'id');
    }

    
}
