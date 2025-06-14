@extends('layouts.app')
@section('title')
    -> Fiche coloration
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche coloration:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('coloration.index') }}"
                > Liste des coloration</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Coloration : {{$coloration->name}}</H4>
        </div>
        <div class="mb-3">
            <h5> Culture : {{$coloration->culture->name}}</h5>
        </div>



    </div>
@endsection
