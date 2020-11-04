@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>Tema 1</h1>
            <h6><a href="/sukurti">Sukurti įrašą</a></h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <a href="/tema1/irasas1">Įrašas 1</a>
                        </div>
                        <div class="col-2 ">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ---
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Redaguoti</a>
                                  <a class="dropdown-item" href="#">Šalinti</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </li>
            </ul>           
        </div>
    </div>
</div>
@endsection