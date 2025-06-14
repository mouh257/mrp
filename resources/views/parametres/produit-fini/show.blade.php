@extends('layouts.app')
@section('title')
    -> Fiche produit fini
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche produit fini:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('produitfini.index') }}"
                > Liste des produits fini</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Designation : {{$produitfini->name}} </H4>
        </div>
        <div class="mb-3">
            <h5>Spécifications : {{$produitfini->pdscolis}} kg
                {{$produitfini->culture->name}}
                dans {{$produitfini->colis->name}}</h5>
        </div>

        <div class="mb-3">
            <h5>Composition : @isset($produitfini->barquette)
                    {{$produitfini->pdsbrqtt}} gr x {{$produitfini->nbrbrqtt}}
                    @isset($produitfini->etiquette)
                        Avec étiquettes {{$produitfini->etiquette->name}}
                    @else Sans étiquettes @endisset

                @else Vrac @endisset</h5>
        </div>


    </div>
@endsection
