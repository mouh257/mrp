@extends('layouts.app')
@section('title')
    -> Fiche Variété
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche Variété:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('variete.index') }}"
                > Liste des Variétés</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$variete->name}}</H4>
        </div>
        <div class="mb-3">
            <h5>Culture : {{$variete->culture->name}}</h5>
        </div>

    </div>
@endsection
