<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Each post belongs to an user
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Each post has many comments
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // Each post belongs to a theme
    public function theme(){
        return $this->belongsTo('App\Theme');
    }
}
