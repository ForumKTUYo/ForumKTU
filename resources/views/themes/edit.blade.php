@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <form action="{{ route('themes.update', $theme->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="theme_name">Temos pavadinimas</label>
          <input type="text" class="form-control" name="theme_name" placeholder="Tema" value="{{$theme->name}}">
        </div>
        <div class="form-group">
          <label for="theme_description">Temos aprašymas</label>
          <textarea class="description" name="theme_description">{{$theme->description}}</textarea>
          <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
          <script>
            tinymce.init({
                          selector:'textarea.description',
                          height: 300
                      });
          </script>
        </div>
        <button type="submit" class="btn btn-success">Atnaujinti</button>
      </form>
    </div>
  </div>
</div>
@endsection