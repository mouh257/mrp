@extends('layouts.app')
@section('title')
    -> Fiche Retour
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche retour:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('retour.index') }}"
                > Liste des retours</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> N°BL/N°BR : {{$retour->reception->nbl}} / {{$retour->reception->nbr}} ,reçu le  {{$retour->reception->created_at}}</H4>
        </div>
        <div class="mb-3">
            <h5>Culture/Variété : {{$retour->reception->culture->name}} / {{$retour->reception->variete->name}}</h5>
        </div>

        <div class="mb-3">
            <h5>Ferme/Versement : {{$retour->reception->ferme->name}} / {{$retour->reception->versement}}</h5>
        </div>

        <div class="mb-3">
            <h5> Poids retour (Kg): {{$retour->pdsretour }}</h5>
        </div>

        <div class="mb-3">
            <h5> Raison: {{$retour->raison}}</h5>
        </div>

    </div>
@endsection
