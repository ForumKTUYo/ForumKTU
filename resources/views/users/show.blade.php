@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
           <h1>{{$user->name}}</h1>
           <h6>Registracijos data: {{$user->created_at}}</h6>
           <h6>Sekamų temų kiekis: implement pls</h6>
           <button type="button" class="btn btn-success" href="{{route('users.follow', $user->id)}}">Sekti</button>
           <a href="{{route('users.follow', $user->id)}}">Temp Sekti</a>
           <button type="button" class="btn btn-danger">Įspėti</button>
        </div>
    </div>
</div>
@endsection