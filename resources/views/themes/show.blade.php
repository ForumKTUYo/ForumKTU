@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <h1>{{ $theme->name }}</h1>
            <h6><a href="{{ route('posts.create') }}">Sukurti įrašą</a></h6>
            <ul class="list-group list-group-flush">

                @foreach ($posts as $post)
                <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <div class="row">
                                <a href="{{ route('users.show', 1) }}">{{ $post->user->name }}</a>
                            </div>
                            <div class="row">
                                <h5>
                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('posts.edit', $post->id) }}">
                                <button type="button" class="btn btn-primary">Redaguoti</button>
                            </a> 
                            <form action="{{ route('posts.destroy', $post->id) }} " method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-default">Ištrinti</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>           
        </div>
    </div>
</div>
@endsection