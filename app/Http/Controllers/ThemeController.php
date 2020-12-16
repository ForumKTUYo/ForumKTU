<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Post;
use DB;

class ThemeController extends Controller
{
    public function create(){
        return view('themes.create');
    }

    public function edit($id){
        $theme = Theme::findOrFail($id);
        $data = [
            'theme' => $theme,
        ];
        return view('themes.edit', $data);
    }

    public function index(){
        $themes = Theme::orderby('created_at', 'desc')->paginate(10);
        // if($method == 'creation_time_ascending'){
        //     $themes = Theme::orderby('created_at', 'asc')->paginate(10);
        // }
        return view('themes.index', ['themes' => $themes]);
    }

    public function show($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        // $posts = Post::orderBy('name', 'desc')->get();
        // $posts = Post::orderBy('name', 'asc')->get();
        // $posts = Post::orderBy('view_count', 'desc')->get();
        // $posts = Post::orderBy('view_count', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function lock($id){
        $theme = Theme::findOrFail($id);
        $theme->locked = 1;
        $theme->save();
        return redirect('/');
    }

    public function unlock($id){
        $theme = Theme::findOrFail($id);
        $theme->locked = 0;
        $theme->save();
        return redirect('/');
    }

    public function update($id){
        $theme = Theme::find($id);
        $theme->name = request('theme_name');
        $theme->description = request('theme_description');

        $theme->save();
        return redirect('/')->with('msg', 'Tema sėkmingai atnaujinta.');
    }

    public function store(){    
        $theme = new Theme();
        $theme->name = request('theme_name');
        $theme->description = request('theme_description');

        $theme->save();

        return redirect('/')->with('msg', 'Nauja tema sėkmingai sukurta.');
    }

    public function destroy($id){
        $theme = Theme::find($id);
        $theme->delete();

        return redirect('/');
    }
}
