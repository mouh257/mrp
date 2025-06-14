@extends('layouts.app')
@section('title')
    -> Fiche facture
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Facture n°: <b>{{$facture->reference}}</b> </h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('facture.index') }}"
                > Liste des factures</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4>
                Fournisseur : <b>{{$facture->fournisseur->name}}</b>
            </H4>

            <H4>
               Montant :  <b>{{$facture->montant}} dhs</b>
            </H4>

            Le : <b>{{$facture->date}}</b>


        </div>
    </div>
@endsection
