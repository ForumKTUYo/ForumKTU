@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1>Sekami vartotojai</h1>
      <ul class="list-group list-group-flush">

        @foreach ($users as $user)



        <li class="list-group-item">
          <div class="row justify-content-between">
            <div class="col-8">
              <h3 class="mb-0 pt-1">
                <a href="{{ route('users.show', $user->id) }}">{{$user->name}}</a>
              </h3>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection