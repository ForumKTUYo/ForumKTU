@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
           <h1>{{$user->name}}</h1>
           <h6>Registracijos data: {{$user->created_at}}</h6>
           <h6>Sekamų temų kiekis: {{$theme->count()}}</h6>
           @can('admin-user')
           @if ($exists = $user->followers->contains(Auth::user()->id))
           <a href="{{route('users.unfollow', $user->id)}}"><button type="button" class="btn btn-danger">Atsekti</button></a>
           @else
           <a href="{{route('users.follow', $user->id)}}"><button type="button" class="btn btn-success">Sekti</button></a>
           @endif
           @endcan
           @can('admin')
           <a href="{{route('warnings.create', $user->id)}}"><button type="button" class="btn btn-danger">Įspėti</button></a>
           @endcan
        </div>
    </div>
</div>
@endsection