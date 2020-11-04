@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form>
                <div class="form-group">
                  <label for="post_name">Įrašo pavadinimas</label>
                  <input type="text" class="form-control" id="post_name" placeholder="Įrašas">
                </div>
                <div class="form-group">
                  <label for="theme_selection">Tema</label>
                  <select class="form-control" id="theme_selection">
                    <option>Tema 1</option>
                    <option>Tema 2</option>
                    <option>Tema 3</option>
                    <option>Tema 4</option>
                    <option>Tema 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="post_content">Įrašo turinys</label>
                  <textarea class="form-control" id="post_content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Skelbti</button>
              </form>
        </div>
    </div>
</div>
@endsection