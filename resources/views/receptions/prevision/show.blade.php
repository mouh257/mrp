@extends('layouts.app')
@section('title')
    -> Fiche prévision
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche prévision:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('prevision.index') }}"
                > Liste des prévisions</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <b> Prévision de la ferme : <u>{{$prevision->ferme->name}}</u>  pour le  <u>{{$prevision->dateprevision}}</u></b>
        </div>
        <div class="mb-3">
            <b>Culture - Variété : </b>{{$prevision->culture->name}} - {{$prevision->variete->name}}
        </div>

        <div class="mb-3">
            <b>Poids prévu de la récolte : </b>{{$prevision->pdsprevu}} Kg
        </div>


    </div>
@endsection
