@extends('layouts.app')
@section('title')
    -> Fiche commande
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche commande</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('commande.index') }}"
                > Liste des commandes</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                Commande N° <b>{{$commande->numcmd}}</b>
                pour le client: <b>{{$commande->client}}</b>
            </H4>

            <H3>
                @isset($commande->produitfini)
                    Produit : <b>{{$commande->produitfini->culture->name}}</b>
                @endisset
            </H3>
            <H3>
                {{$commande->nbrcolis}} colis
                @isset($commande->produitfini->colis)
                {{$commande->produitfini->colis->name}}
                @endisset
            </H3>
            <H3>
                @isset($commande->produitfini->barquette)
                {{$commande->produitfini->barquette->name}} x {{$commande->produitfini->nbrbrqtt}}
                @else
                    Vrac {{$commande->produitfini->pdscolis}}
                @endisset
            </H3>
        </div>

        <div class="mb-3">
        @isset($commande->observation)
                Observation : {{$commande->observation}}
        @endisset
        </div>




    </div>
@endsection
