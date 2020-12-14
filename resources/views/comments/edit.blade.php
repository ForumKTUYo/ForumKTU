@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="comment_content">Komentaro turinys:</label>
          <textarea  class="form-control" name="comment_content" rows="3">{{$comment->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Atnaujinti</button>
      </form>
    </div>
  </div>
</div>
@endsection