<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Each post belongs to an user
    public function user(){
        $this->belongsTo('App\User');
    }
}
