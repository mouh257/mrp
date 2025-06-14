@extends('layouts.app')
@section('title')
    -> Fiche producteur
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche producteur:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('producteur.index') }}"
                > Liste des producteurs</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$producteur->name}}</H4>

        </div>
        <div class="mb-3">
            <h4>Référence : {{$producteur->ref}}</h4>
        </div>
        <div class="mb-3">
            <h4>GGN : {{$producteur->ggn}}</h4>
        </div>
        <div class="mb-3">
            <h4>Liste des fermes :</h4>
            <ul class="list-group">
                @foreach($producteur->fermes as $f)
                    <li class="list-group-item">Ferme {{$f->name}} </li>
                @endforeach
            </ul>
        </div>


    </div>
@endsection
