<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Theme;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        $themes = $user->followed_themes()->get();
        return view('users.show', ['user' => $user], ['theme' => $themes]);
    }

    public function profile(){
        $user = Auth::user();
        $themes = $user->followed_themes()->get();
        return view('users.profile', ['user' => $user], ['theme' => $themes]);
    }

    public function follow($id){
        $user = Auth::user();
        $usera = User::findOrFail($id);
        $usera->following()->attach($user->$id);
        return back();
    }

    public function following(){
        $user = Auth::user();
        $users = $user->following()->get();
        // Pasikeisk i custom puslapi
        return view('users.following', ['users' => $users]);
    }
}
