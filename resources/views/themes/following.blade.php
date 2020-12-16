@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1>Sekamos temos</h1>
      <ul class="list-group list-group-flush">

        @foreach ($themes as $theme)
        <form id="edit-form{{$theme->id}}" action="{{ route('themes.edit', $theme->id) }}" method="post">
          @method('get')
          @csrf
        </form>
        <form id="delete-form{{$theme->id}}" action="{{ route('themes.destroy', $theme->id) }}" method="post">
          @method('delete')
          @csrf
        </form>
        <form id="lock-form{{$theme->id}}" action="{{ route('themes.lock', $theme->id) }}" method="post">
          @method('put')
          @csrf
        </form>
        <form id="unlock-form{{$theme->id}}" action="{{ route('themes.unlock', $theme->id) }}" method="post">
          @method('put')
          @csrf
        </form>


        <li class="list-group-item">
          <div class="row justify-content-between">
            <div class="col-8">
              <h3 class="mb-0 pt-1">
                <a href="{{ route('themes.show', $theme->id) }}">{{$theme->name}}</a>
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