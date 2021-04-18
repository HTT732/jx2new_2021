<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfNews extends Model
{
    use HasFactory;

    protected $table = "type_of_news";

    public function Message () {
        return $this->hasMany('App\Message', 'typeOfNewID', 'id');
    }
}
