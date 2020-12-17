<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function id(){

    }

    public function follow($id){
        $user = Auth::user();
        $usera = User::findOrFail($id);
        $usera->following()->attach($user->id);
        return back();
    }

    public function following(){
        $user = Auth::user();
        $users = $user->following()->get();
        // Pasikeisk i custom puslapi
        dd($user);
        return view('users.following', ['users' => $users]);
    }
}
