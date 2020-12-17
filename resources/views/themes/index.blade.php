@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1>Temos</h1>
      <h6>Rikiuoti didėjimo tvarka: 
        <a href="{{ route('themes.indexPostAsc') }}">[įrašai]</a> 
        <a href="{{ route('themes.indexMonPostAsc') }}">[mėnesiniai įrašai]</a> 
        <a href="{{ route('themes.indexViewAsc') }}">[peržiūros]</a>
        <a href="{{ route('themes.indexMonViewAsc') }}">[mėnesinės peržiūros]</a> 
      </h6>
      <h6>Rikiuoti mažėjimo tvarka: 
        <a href="{{ route('themes.index') }}">[įrašai]</a> 
        <a href="{{ route('themes.indexMonPostDesc') }}">[mėnesiniai įrašai]</a> 
        <a href="{{ route('themes.indexViewDesc') }}">[peržiūros]</a> 
        <a href="{{ route('themes.indexMonViewDesc') }}">[mėnesinės peržiūros]</a> 
      </h6>
      <h6><a href="{{ route('themes.create') }}">Sukurti temą</a></h6>
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
            <div class="col-1">
              <a href="{{route('themes.follow', $theme->id)}}"><button type="button" class="btn btn-success">Sekti</button></a>
            </div>
            <div class="col-2 ">

              <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ---
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" onclick="event.preventDefault();
                                  document.getElementById('edit-form{{$theme->id}}').submit();">Redaguoti {{$theme->id}}</a>
                  @if ($theme->locked == 1)
                  <a class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('unlock-form{{$theme->id}}').submit();">Atrakinti {{$theme->id}}</a>
                  @else
                  <a class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('lock-form{{$theme->id}}').submit();">Užrakinti {{$theme->id}}</a>
                  @endif
                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">Ištrinti {{$theme->id}}</a>
                </div>
              </div>
            </div>

          </div>
          <div class="row pl-3">
            <p>{!! $theme->description !!}</p>
          </div>
        </li>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Temos ištrynimas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Ar tikrai norite ištrinti temą {{ $theme->title }}?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                document.getElementById('delete-form{{$theme->id}}').submit();">Taip</button>
              </div>
            </div>
          </div>
        </div>




        @endforeach
        {{$themes->links()}}
      </ul>
    </div>
  </div>
</div>
@endsection