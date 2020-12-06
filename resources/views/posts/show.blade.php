@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>{{ $post->title }}</h1>
            <h6><a href="{{ route('users.show', $post->user->id) }}">{{$post->user->name}}</a> {{ $post->created_at }} </h6>
            <p>{!! $post->content !!}</p>
            <h4>Komentarai: </h4>
            <ul class="list-group list-group-flush">
                @foreach ($comments as $comment)
                <li class="list-group-item">
                    <h6>
                    <a href="{{ route('users.show', $post->user->id) }}">
                        {{$comment->user->name}}
                    </a> 
                    {{$comment->created_at}}
                    </h6>
                    <p>{{$comment->content}}</p>
                    <form action="{{ route('comments.destroy', $comment->id) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Ištrinti">
                    </form>
                </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf
                <div class="form-group">
                    <label for="comment_content">Komentaras: </label>
                    <textarea class="form-control" name="comment_content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Skelbti</button>
            </form>
        </div>
    </div>
</div>
@endsection