@extends('layouts.app')
@section('title')
    -> Fiche livraison
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Bon de livraison n°: <b>{{$livraison->nbl}}</b> </h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('livraison.index') }}"
                > Liste des livraisons</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                Fournisseur : <b>{{$livraison->fournisseur->name}}</b>
            </H4>

            <H5>
                @isset($livraison->commande)
                    pour la commande de : <b> {{$livraison->commande->quantite}} </b> date : <b>{{$livraison->commande->date}}</b>
                @endisset
            </H5>

            <H4>
                <b>{{$livraison->quantite}}</b> {{$livraison->article->unite}} de : <b>{{$livraison->article->name}}</b>
            </H4>

            Reçu le : <b>{{$livraison->date}}</b>


        </div>
    </div>
@endsection
