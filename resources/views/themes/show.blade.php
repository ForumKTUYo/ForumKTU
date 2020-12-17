@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>{{ $theme->name }}</h1>
            <p>{!! $theme->description !!}</p>
            <h6>Rikiuoti didėjimo tvarka:
                <a href="{{ route('themes.showCreationAsc', $theme->id) }}">[sukūrimo data]</a>
                <a href="{{ route('themes.showComAsc', $theme->id) }}">[komentarai]</a>
                <a href="{{ route('themes.showMonComAsc', $theme->id) }}">[mėnesiniai komentarai]</a>
                <a href="{{ route('themes.showViewAsc', $theme->id) }}">[peržiūros]</a>
                <a href="{{ route('themes.showMonViewAsc', $theme->id) }}">[mėnesinės peržiūros]</a>
            </h6>
            <h6>Rikiuoti mažėjimo tvarka:
                <a href="{{ route('themes.show', $theme->id) }}">[sukūrimo data]</a>
                <a href="{{ route('themes.showComDesc', $theme->id) }}">[komentarai]</a>
                <a href="{{ route('themes.showMonComDesc', $theme->id) }}">[mėnesiniai komentarai]</a>
                <a href="{{ route('themes.showViewDesc', $theme->id) }}">[peržiūros]</a>
                <a href="{{ route('themes.showMonViewDesc', $theme->id) }}">[mėnesinės peržiūros]</a>
            </h6>
            <h6><a href="{{ route('posts.create') }}">Sukurti įrašą</a></h6>
            <ul class="list-group list-group-flush">

                @foreach ($posts as $post)

                <form id="delete-form{{$post->id}}" action="{{ route('posts.destroy', $post->id) }} "
                    method="POST">
                    @method('delete')
                    @csrf
                </form>

                <!-- Modal for post delete -->
                <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1"
                    aria-labelledby="deleteModal{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Įrašo ištrynimas</h5>
                            </div>
                            <div class="modal-body">
                                Ar tikrai norite ištrinti įrašą {{ $post->title }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('delete-form{{$post->id}}').submit();">Taip</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
                            </div>
                        </div>
                    </div>
                </div>

                <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <div class="row">
                                <a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
                            </div>
                            <div class="row">
                                <h5>
                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ---
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Redaguoti</a>
                                    <a class="dropdown-item" href="#deleteModal{{$post->id}}" data-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">Ištrinti</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection