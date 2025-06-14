@extends('layouts.app')
@section('title')
    -> Fiche Fournisseur
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche Fournisseur:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('fournisseur.index') }}"
                > Liste des fournisseurs</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$fournisseur->name}}</H4>

        </div>
        <div class="mb-3">
            <h4>Contacts :</h4>
                <h5> e-mail :_@_.com</h5>
                <h5> N° tél :06 00 00 00 00</h5>
        </div>



    </div>
@endsection
