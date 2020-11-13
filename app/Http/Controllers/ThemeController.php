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
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function store(){    
        $theme = new Theme();
        $theme->name = request('name'); 
        $theme->post_count = 0;
        $theme->view_count = 0;

        $theme->save();

        return redirect('/')->with('msg', 'Nauja tema sėkmingai sukurta.');
    }

    public function destroy($id){
        $theme = Theme::findOrFail($id);
        $theme->delete();

        return redirect('/');
    }
}
