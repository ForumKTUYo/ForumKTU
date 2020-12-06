<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Each comment is written by one user.
    public function user(){
        $this->belongsTo('App\User');
    }

    // Each comment belongs to a post
    public function post(){
        $this->belongsTo('App\Post');
    }
}
