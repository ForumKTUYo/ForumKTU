@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="post_content">Komentaro turinys</label>
          <input type="text" name="comment_content" id="" value="{{$comment->content}}">
        </div>
        <button type="submit" class="btn btn-success">Atnaujinti</button>
      </form>
    </div>
  </div>
</div>
@endsection