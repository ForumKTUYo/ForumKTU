<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function followers(){
        return $this->hasMany('App\User');
    }
}
