@extends('layouts.app')
@section('title')
    -> Fiche colisage
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche colisage</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('colisage.index') }}"
                > Liste des colis</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <u>Versement</u> : <b> {{$colisage->versement}} </b>
            <br>
            <u>Composition</u> :<b>{{$colisage->nbrcolis}} x {{$colisage->produitfini->name}} </b>
            <br>
            <u>Variété</u> :<b> {{$colisage->variete->name}} </b>
            <br>
            <u>Calibre</u> :<b> {{$colisage->calibre->name}} </b>
            <br>
            <u>Coloration</u> :<b> {{$colisage->coloration->name}} </b>
        </div>

        <div class="mb-3">
        @isset($colisage->palette)
            N° serie palette : {{$colisage->palette->id}}
        @else Non affecté a aucune palette ! @endisset
        </div>




    </div>
@endsection
