<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class ThemeController extends Controller
{
    public function create(){
        return view('themes.create');
    }

    public function follow($id){
        $user = Auth::user();
        $theme = Theme::findOrFail($id);
        $theme->followers()->attach($user->id);
        return back();
    }

    public function edit($id){
        $theme = Theme::findOrFail($id);
        $data = [
            'theme' => $theme,
        ];
        return view('themes.edit', $data);
    }

    public function index(){
        $themes = Theme::orderby('posts_count', 'desc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexPostAsc(){
        $themes = Theme::orderby('posts_count', 'asc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexMonPostAsc(){
        $themes = Theme::orderby('monthly_posts_count', 'asc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexMonPostDesc(){
        $themes = Theme::orderby('monthly_posts_count', 'desc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexViewAsc(){
        $themes = Theme::orderby('views', 'asc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexViewDesc(){
        $themes = Theme::orderby('views', 'desc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexMonViewAsc(){
        $themes = Theme::orderby('monthly_views', 'asc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }

    public function indexMonViewDesc(){
        $themes = Theme::orderby('monthly_views', 'desc')->paginate(10);
        return view('themes.index', ['themes' => $themes]);
    }


    public function show($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderBy('created_at', 'desc')->get();

        $theme->views += 1;
        $theme->monthly_views += 1;
        if(Carbon::now()->day == 1){
            $theme->monthly_views = 0;
        }

        $theme->save();

        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showCreationAsc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('created_at', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showComAsc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('comments_count', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showComDesc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('comments_count', 'desc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showMonComAsc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('monthly_comments_count', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showMonComDesc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('monthly_comments_count', 'desc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showViewAsc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('views', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showViewDesc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('views', 'desc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showMonViewAsc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('monthly_views', 'asc')->get();
        $data = [
            'theme' => $theme,
            'posts' => $posts
        ];
        return view('themes.show', $data);
    }

    public function showMonViewDesc($id){
        $theme = Theme::findOrFail($id);
        $posts = $theme->posts;
        $posts = Post::orderby('monthly_views', 'desc')->get();
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
