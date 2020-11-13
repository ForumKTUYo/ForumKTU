@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <h1>{{ $post->title }}</h1>
        <h6><a href="{{ route('users.show', 1) }}">Kūrėjas</a> {{ $post->created_at }} </h6>    
        <p>{!! $post->content !!}</p>   
        <h4>Komentarai: </h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6><a href="{{ route('users.show', 1) }}">Komentaro autorius</a> 15:00 2020-11-04</h6>
                    <p>Komentaro tekstas: Lorem ipsum, dolor sit amet consectetur adipisicing elit. ium illo dolore asperiores velit nulla ipsam quod in optio!</p>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6><a href="{{ route('users.show', 1) }}">Komentaro autorius 2</a> 15:01 2020-11-04</h6>
                    <p>Komentaro tekstas: Lorem ipsum, dolor sit amet consectetur adipisicing elit. ium illo dolore asperiores velit nulla ipsam quod in optio!</p>
                </li>
            </ul>
            <form action="">
                <div class="form-group">
                    <label for="komentaro_tekstas">Komentaras: </label>
                    <textarea class="form-control" id="komentaro_tekstas" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Skelbti</button>
            </form>
        </div>
    </div>
</div>
@endsection