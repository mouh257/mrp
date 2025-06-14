@extends('layouts.app')
@section('title')
    -> Fiche Serre
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche serre:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('serre.index') }}"
                > Liste des serres</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$serre->name}} / {{$serre->ferme->name}}</H4>
        </div>
        <div class="mb-3">
            <h5>Superficie : {{$serre->superficie}} ha</h5>
        </div>

        <div class="mb-3">
            <h5>Culture : {{$serre->culture->name}}</h5>
        </div>
        <div class="mb-3">
            <h5>Variété : {{$serre->variete->name}}</h5>
        </div>

    </div>
@endsection
