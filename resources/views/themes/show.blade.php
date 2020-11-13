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
                                <a href="{{ route('users.show', 1) }}">Įrašo kūrėjas</a>
                            </div>
                            <div class="row">
                                <h5>
                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 ">
                            <a class="dropdown-item" href="{{ route('posts.create') }}">Redaguoti</a>
                            <a class="dropdown-item" href="{{ route('posts.destroy', $post->id) }}">Šalinti</a>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>           
        </div>
    </div>
</div>
@endsection