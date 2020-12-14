<?php

namespace App\Http\Controllers;
use App\Post;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    public function create(){
        $themes = Theme::get();
        return view('posts.create', ['themes' => $themes]);
    }

    public function show($id){
        $post = Post::find($id);

        $post->views += 1;
        $post->monthly_views += 1;
        if(Carbon::now()->day == 1){
            $post->monthly_views = 0;
        }

        $post->save();

        $comments = $post->comments;
        $data = [
            'post' => $post,
            'comments' => $comments
        ];
        return view('posts.show', $data);
    }

    public function store(){    
        $post = new Post();
        $post->title = request('post_name');
        $post->theme_id = request('selected_theme');
        $post->content = request('post_content');
        $post->user_id = Auth::id();

        $theme = Theme::find($post->theme_id);
        $theme->posts_count += 1;
        $theme->monthly_posts_count += 1;
        $theme->save();

        $post->save();
        return redirect()->route('themes.show', $post->theme_id)->with('msg', 'Naujas įrašas sėkmingai sukurtas.');
    }

    public function edit($id){
        $themes = Theme::all();
        $post = Post::findOrFail($id);
        $data = [
            'post' => $post,
            'themes' => $themes
        ];
        return view('posts.edit', $data);
    }

    public function update($id){
        $post = Post::find($id);
        $post->title = request('post_name');
        $post->theme_id = request('selected_theme');
        $post->content = request('post_content');

        $post->save();
        return redirect()->route('posts.show', $post->id)->with('msg', 'Įrašas sėkmingai atnaujintas.');
    }

    public function destroy($id){
        $post = Post::find($id);
        $theme = $post->theme;
        $theme->posts_count -= 1;
        $theme->save();
        $post->delete();

        return back();
    }

    public function search(){
        $query = $_GET['query'];
        $posts = Post::where('title', 'LIKE', "%$query%")->orWhere('content', 'LIKE', "%$query%")->get();
        return view('posts.search')->with('posts', $posts);
    }
}
