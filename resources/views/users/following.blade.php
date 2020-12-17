@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1>Sekami vartotojai</h1>
      <ul class="list-group list-group-flush">

        @foreach ($users as $user)
        <form id="edit-form{{$user->id}}" action="{{ route('users.edit', $user->id) }}" method="post">
          @method('get')
          @csrf
        </form>
        <form id="delete-form{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="post">
          @method('delete')
          @csrf
        </form>
        <form id="lock-form{{$user->id}}" action="{{ route('users.lock', $user->id) }}" method="post">
          @method('put')
          @csrf
        </form>
        <form id="unlock-form{{$user->id}}" action="{{ route('users.unlock', $user->id) }}" method="post">
          @method('put')
          @csrf
        </form>


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