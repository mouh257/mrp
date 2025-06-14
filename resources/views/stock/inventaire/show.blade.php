@extends('layouts.app')
@section('title')
    -> Fiche inventaire
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Inventaire n°: <b>{{$inventaire->id}}</b> </h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('inventaire.index') }}"
                > Liste des inventaires</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                <b>{{$inventaire->quantite}}</b> {{$inventaire->article->unite}} de : <b>{{$inventaire->article->name}}</b>
            </H4>

            <H5>
                @isset($inventaire->fournisseur)
                    Fournisseur : <b> {{$inventaire->fournisseur->name}} </b>
                @endisset
            </H5>

            Fait le : <b>{{$inventaire->date}}</b>


        </div>
    </div>
@endsection
