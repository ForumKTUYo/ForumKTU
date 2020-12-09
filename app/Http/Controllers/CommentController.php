<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function store($id){    
        $post = Post::find($id);

        $comment = new Comment();
        $comment->content = request('comment_content');
        $comment->user_id = Auth::id();
        $comment->post_id = $id;

        $post->comments_count += 1;
        $post->monthly_comments_count += 1;
        if(Carbon::now()->day == 1){
            $post->monthly_comments_count = 0;
        }
        $post->save();
        $post = $post->comments()->save($comment);
        return redirect()->route('posts.show', $id)->with('msg', 'Naujas komentaras sėkmingai sukurtas.');
    }

    public function destroy($id){    
        $comment = Comment::find($id);
        $post = $comment->post;
        $post->comments_count -= 1;
        $post->save();
        $comment->delete();
        return back();
    }
}
