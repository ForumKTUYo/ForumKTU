@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <form action="{{ route('posts.store') }}" method="POST">
          @csrf
                <div class="form-group">
                  <label for="post_name">Įrašo pavadinimas</label>
                  <input type="text" class="form-control" name="post_name" placeholder="Įrašas" required>
                </div>
                <div class="form-group">
                  <label for="theme_selection">Tema</label>
                  <select class="form-control" name="selected_theme">
                    @foreach ($themes as $theme)
                     <option value="{{$theme->id}}">{{ $theme->name }}</option>                        
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="post_content">Įrašo turinys</label>
                  <textarea class="description" name="post_content"></textarea>
                  <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                  <script>
                      tinymce.init({
                          selector:'textarea.description',
                          height: 300
                      });
                  </script>
                </div>
                <button type="submit" class="btn btn-success">Skelbti</button>
              </form>
        </div>
    </div>
</div>
@endsection