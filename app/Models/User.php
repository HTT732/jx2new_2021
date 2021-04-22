<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    private $user;

    public function __constructor(User $user)
    {
        $this->user = $user;
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Product () {
        return $this->hasMany('App\Models\Product', 'userID', 'id');
    }

    public function News () {
        return $this->hasMany(News::class, 'idUser', 'id');
    }

    public function LikeView () {
        return $this->hasOneThrough(
            LikeView::class,
            Product::class,
            'userID',
            'id',
            'id3',
            'likeViewID'
        );
    }

    public function Comment () {
        return $this->hasManyThrough(
            Comment::class,
            News::class,
            'idUser',
            'newsID',
            'id', 'id'

        );
    }
}
