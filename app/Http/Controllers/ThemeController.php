<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Post;
use DB;

class ThemeController extends Controller
{
    public function index(){
        $themes = Theme::orderby('created_at')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function show($id){
        $theme = Theme::findOrFail($id);
        $posts = Post::where('theme_id', $id)->get();
        // $posts = $theme->posts;
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

    public function store(){    
        $theme = new Theme();
        $theme->name = request('name');
        // Temporary 
        $theme->description = '';

        $theme->save();

        return redirect('/')->with('msg', 'Nauja tema sėkmingai sukurta.');
    }

    public function destroy($id){
        $theme = Theme::findOrFail($id);
        $theme->delete();

        return redirect('/');
    }
}
