@extends('layouts.app')
@section('title')
    -> Fiche BR/BS
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Bon de retour n°: <b>{{$sortie->nbs}}</b> </h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('sortie.index') }}"
                > Liste des retours</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                Fournisseur : <b>{{$sortie->fournisseur->name}}</b>
            </H4>

            <H4>
                <b>{{$sortie->quantite}}</b> {{$sortie->article->unite}} de : <b>{{$sortie->article->name}}</b>
            </H4>

            Le : <b>{{$sortie->date}}</b>


        </div>
    </div>
@endsection
