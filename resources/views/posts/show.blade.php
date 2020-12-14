@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>{{ $post->title }}</h1>
            <h6><a href="{{ route('users.show', $post->user->id) }}">{{$post->user->name}}</a> {{ $post->created_at }}
            </h6>
            <p>{!! $post->content !!}</p>
            <h4>Komentarai: </h4>
            <ul class="list-group list-group-flush">
                @foreach ($comments as $comment)
                <li class="list-group-item" id="comment-{{$comment->id}}">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="comment">
                                <a href="{{ route('users.show', $post->user->id) }}">
                                    {{$comment->user->name}}
                                </a><br>
                                Sukurta: {{$comment->created_at}}<br>
                                <p>{{$comment->content}}</p>
                            </div>

                        </div>
                        <div class="col-sm-2">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ---
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="edit-comment" href="{{ route('comments.edit', $comment->id) }}">Redaguoti</a>
                                    <a class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('delete-form{{$comment->id}}').submit();">Ištrinti</a>
                                </div>
                            </div>


                            <form id="delete-form{{$comment->id}}" method="POST"
                                action="{{ route('comments.destroy', $comment->id) }}">
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
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