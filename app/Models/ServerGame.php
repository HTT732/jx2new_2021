<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerGame extends Model
{
    use HasFactory;

    protected $table = "server_games";

    public function Product () {
        return $this->hasMany('App\Product', 'serverGameID', 'id');
    }

    public function User () {
        return $this->hasMany('App\User', 'serverGameID', 'id');
    }
}
