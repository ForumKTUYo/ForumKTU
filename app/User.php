<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User has many posts
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // User has many comments
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function warnings(){
        return $this->belongsToMany('App\Warning');
    }

    public function followed_themes(){
        return $this->belongsToMany('App\Theme');
    }

    public function followers(){
        return $this->belongsToMany('App\User');
    }

    public function following(){
        return $this->belongsToMany('App\User');
    }
}
