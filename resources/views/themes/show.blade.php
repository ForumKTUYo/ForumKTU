@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <h1>{{ $theme->name }}</h1>
        <p>{!! $theme->description !!}</p>
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
                        <div class="col-2">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ---
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Redaguoti</a>
                                  <a class="dropdown-item" onclick="event.preventDefault();
                                  document.getElementById('delete-form{{$post->id}}').submit();">Ištrinti</a>
                                </div>
                              </div>
                            <form id="delete-form{{$post->id}}" action="{{ route('posts.destroy', $post->id) }} " method="POST">
                                @method('delete')
                                @csrf
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