@extends('layouts.app')
@section('title')
    -> Fiche Ecart
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche écart:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('ecart.index') }}"
                > Liste des écarts</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> N°BL/N°BR : {{$ecart->reception->nbl}} / {{$ecart->reception->nbr}} ,reçu le  {{$ecart->reception->created_at}}</H4>
        </div>
        <div class="mb-3">
            <h5>Culture/Variété : {{$ecart->reception->culture->name}} / {{$ecart->reception->variete->name}}</h5>
        </div>

        <div class="mb-3">
            <h5>Ferme/Versement : {{$ecart->reception->ferme->name}} / {{$ecart->reception->versement}}</h5>
        </div>

        <div class="mb-3">
            <h5> Poids écart (Kg): {{$ecart->pdsecart}}</h5>
        </div>


    </div>
@endsection
