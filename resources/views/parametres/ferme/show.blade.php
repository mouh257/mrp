@extends('layouts.app')
@section('title')
    -> Fiche ferme
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche ferme:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('ferme.index') }}"
                > Liste des fermes</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$ferme->name}}</H4>
        </div>
        <div class="mb-3">
            <h5>Producteur : {{$ferme->producteur->name}}</h5>
        </div>
        <div class="mb-3">
            <h5>Adresse : {{$ferme->adresse}}</h5>
        </div>

        <div class="mb-3">
            <h5>Liste des serres :</h5>
            <ul class="list-group">
                @foreach($ferme->serres as $s)
                    <li class="list-group-item">{{$s->superficie}} ha, {{$s->culture->name}} - {{$s->variete->name}} </li>
                @endforeach
            </ul>
        </div>


    </div>
@endsection
