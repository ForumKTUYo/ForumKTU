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
      @can('admin')
      <h6><a href="{{ route('themes.create') }}">Sukurti temą</a></h6>
      @endcan
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


        <!-- Modal for theme delete -->
        <div class="modal fade" id="deleteModal{{$theme->id}}" tabindex="-1" aria-labelledby="deleteModal{{$theme->id}}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Temos ištrynimas</h5>
              </div>
              <div class="modal-body">
                Ar tikrai norite ištrinti temą {{ $theme->name }}?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('delete-form{{$theme->id}}').submit();">Taip</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
              </div>
            </div>
          </div>
        </div>

        
        <!-- Modal for theme lock -->
        <div class="modal fade" id="lockModal{{$theme->id}}" tabindex="-1" aria-labelledby="lockModal{{$theme->id}}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Temos užrakinimas</h5>
              </div>
              <div class="modal-body">
                Ar tikrai norite užrakinti temą {{ $theme->name }}?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('lock-form{{$theme->id}}').submit();">Taip</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal for theme unlock -->
        <div class="modal fade" id="unlockModal{{$theme->id}}" tabindex="-1" aria-labelledby="unlockModal{{$theme->id}}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Temos atrakinimas</h5>
              </div>
              <div class="modal-body">
                Ar tikrai norite atrakinti temą {{ $theme->name }}?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('unlock-form{{$theme->id}}').submit();">Taip</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
              </div>
            </div>
          </div>
        </div>


        <li class="list-group-item">
          <div class="row justify-content-between">
            <div class="col-8">
              <h3 class="mb-0 pt-1">
                <a href="{{ route('themes.show', $theme->id) }}">{{$theme->name}}</a>
              </h3>
            </div>
            @can('admin-user')
            <div class="col-1">
              @if(Auth::check())
                @if ($exists = $theme->followers->contains(Auth::user()->id))
                  <a href="{{route('themes.unfollow', $theme->id)}}"><button type="button" class="btn btn-danger">Atsekti</button></a>
                @else
                  <a href="{{route('themes.follow', $theme->id)}}"><button type="button" class="btn btn-success">Sekti</button></a>
                @endif
              @endif
            </div>
            @endcan
            @can('admin')
            <div class="col-2 ">
    
              <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ---
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" onclick="event.preventDefault();
                                  document.getElementById('edit-form{{$theme->id}}').submit();">Redaguoti</a>
                  @if ($theme->locked == 1)
                  <a class="dropdown-item" href="#unlockModal{{$theme->id}}" data-toggle="modal" data-bs-target="#unlockModal{{$theme->id}}">Atrakinti</a>
                  @else
                  <a class="dropdown-item" href="#lockModal{{$theme->id}}" data-toggle="modal" data-bs-target="#lockModal{{$theme->id}}">Užrakinti</a>
                  @endif
                  <a class="dropdown-item" href="#deleteModal{{$theme->id}}" data-toggle="modal" data-bs-target="#deleteModal{{$theme->id}}">Ištrinti</a>
                </div>
              </div>
            </div>
            @endcan

          </div>
          <div class="row pl-3">
            <p>{!! $theme->description !!}</p>
          </div>
        </li>





        @endforeach
        {{$themes->links()}}
      </ul>
    </div>
  </div>
</div>
@endsection