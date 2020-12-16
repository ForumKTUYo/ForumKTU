@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <form action="{{ route('themes.store') }}" method="POST">
          @csrf
                <div class="form-group">
                  <label for="theme_name">Temos pavadinimas</label>
                  <input type="text" class="form-control" name="theme_name" placeholder="Tema">
                </div>
                <div class="form-group">
                  <label for="theme_description">Temos aprašymas</label>
                  <textarea class="description" name="theme_description"></textarea>
                  <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                  <script>
                      tinymce.init({
                          selector:'textarea.description',
                          height: 300
                      });
                  </script>
                </div>
                <button type="submit" class="btn btn-success">Sukurti</button>
              </form>
        </div>
    </div>
</div>
@endsection