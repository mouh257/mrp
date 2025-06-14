@extends('layouts.app')
@section('title')
    -> Fiche Réception
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche réception:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('reception.index') }}"
                > Liste des réceptions</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> N°BL/N°BR : {{$reception->nbl}} / {{$reception->nbr}} ,reçu le  {{$reception->created_at}}</H4>
        </div>
        <div class="mb-3">
            <h5>Culture/Variété : {{$reception->culture->name}} / {{$reception->variete->name}}</h5>
        </div>

        <div class="mb-3">
            <h5>Ferme/Versement : {{$reception->ferme->name}} / {{$reception->versement}}</h5>
        </div>

        <div class="mb-3">
            <h5> Poids Net (Kg): {{$reception->pdsnet}}</h5>
        </div>

    </div>
@endsection
