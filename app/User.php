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
        'nickname', 'name', 'surname', 'birthday', 'email', 'password', 'post_count', 'color', 'role', 
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

    public function following() {
        return $this->belongsToMany(User::class,null,'user_id','following_id')->withTimestamps();
    }
    
    public function followers() {
        return $this->belongsToMany(User::class,null,'following_id','user_id')->withTimestamps();
    }

    public function hasRole($role){
        if($this->role == $role){
            return true;
        }
        return false;
    }
}
