@extends('layouts.app')
@section('title')
    -> Fiche commande d'article
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Commande d'article n°: <b>{{$approvisionnement->id}}</b> </h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('approvisionnement.index') }}"
                > Liste des commandes d'article</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                <b>{{$approvisionnement->quantite}}</b> {{$approvisionnement->article->unite}} de : <b>{{$approvisionnement->article->name}}</b>
            </H4>

            <H5>Fournisseur : <b> {{$approvisionnement->fournisseur->name}} </b></H5>

            Commandée le : <b>{{$approvisionnement->date}}</b>


        </div>
    </div>
@endsection
