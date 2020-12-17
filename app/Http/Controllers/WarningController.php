<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warning;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class WarningController extends Controller
{
    public function create($id){
        $user = User::findOrFail($id);
        return view('warnings.create', ['user' => $user]);
    }

    public function edit($id){
        $warning = Warning::findOrFail($id);
        $data = [
            'warning' => $warning,
        ];
        return view('warnings.edit', $data);
    }

    public function store($id){    
        $warning = new Warning();
        $warning->content = request('warning_content');
        $warning->save();

        $user = User::findOrFail($id);
        $warning->users()->attach($user->id);

        return back()->with('msg', 'Įspėjimas sėkmingai sukurtas.');
    }

    public function destroy($id){
        $warning = Warning::find($id);
        $warning->delete();
        return back();
    }
}
