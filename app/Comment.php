<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Each comment is written by one user.
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Each comment belongs to a post
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
