@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>Temos</h1>
        <form class="form-inline" method="POST" action="{{ route('themes.store') }}">
                @csrf
                <div class="col-auto pl-0">
                    <label class="sr-only" for="new_theme">Nauja tema</label>
                    <input name="name" type="text" class="form-control mb-2" id="new_theme" placeholder="Nauja tema">
                  </div>
                <button type="submit" class="btn btn-primary mb-2">Kurti</button>
              </form>
            <ul class="list-group list-group-flush">
                
                @foreach ($themes as $theme)
                    <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <h3 class="mb-0 pt-1">
                            <a href="{{ route('themes.show', $theme->id) }}">{{$theme->name}}</a>
                            </h3>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-success">Sekti</button>
                        </div>
                        <div class="col-2 ">

                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ---
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Redaguoti</a>
                                  <a class="dropdown-item" href="#">Užrakinti</a>
                                </div>
                              </div>
                        </div>
                        <form action="{{ route('themes.destroy', $theme->id) }}" method="post">
                          @method('delete')
                          @csrf
                          <button class="btn btn-default" type="submit" >Ištrinti</button>
                          </form>
                    </div>
                </li>
                @endforeach
                {{$themes->links()}}
            </ul>           
        </div>
    </div>
</div>
@endsection
