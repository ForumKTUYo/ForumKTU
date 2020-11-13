<?php

namespace App\Http\Controllers;
use App\Post;
use App\Theme;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        $themes = Theme::get();
        return view('posts.create', ['themes'=>$themes]);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function store(){    
        $post = new Post();
        $post->title = request('post_name');
        $post->theme_id = request('selected_theme');
        $post->content = request('post_content');
        $post->view_count = 0;
        $post->comments_count = 0;
        
        $post->save();
        return redirect('/')->with('msg', 'Naujas įrašas sėkmingai sukurtas.');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }
}
