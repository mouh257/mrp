@extends('layouts.app')
@section('title')
    -> Fiche article
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche article:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('article.index') }}"
                > Liste des articles</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$article->name}}</H4>
        </div>
        <div class="mb-3">
            <h5>Groupe : {{$article->groupe->name}}</h5>
        </div>
        <div class="mb-3">
            <h5>Stock minimum : {{$article->stockmin}} {{$article->unite}}</h5>
        </div>
        <div class="mb-3">
            <h5>Nombre / palette : {{$article->nbrppal}} {{$article->unite}}</h5>
        </div>

    </div>
@endsection
