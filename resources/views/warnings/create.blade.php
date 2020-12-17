@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <form action="{{ route('warnings.store', $user->id) }}" method="POST">
          @csrf
                <div class="form-group">
                  <label for="user_name">Įspėti vartotoją '{{ $user->name }}'</label>
                </div>
                <div class="form-group">
                  <label for="warning_content">Įspėjimo turinys</label>
                  <textarea class="description" name="warning_content"></textarea>
                  <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                  <script>
                      tinymce.init({
                          selector:'textarea.description',
                          height: 300
                      });
                  </script>
                </div>
                <button type="submit" class="btn btn-success">Įspėti</button>
              </form>
        </div>
    </div>
</div>
@endsection