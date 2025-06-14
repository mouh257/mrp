@extends('layouts.app')
@section('title')
    -> Fiche palette
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche palette N°: {{$palette->id}}</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('palette.index') }}"
                > Liste des palettes</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> N° palette: {{$palette->numpal}}
                @isset($p->depart)
                    , N° d'expédition : {{$p->depart->numexp}}
                @else , NA @endisset
                , N° commande: {{$palette->numcmd}}</H4>
        </div>

        <div class="mb-3">
            <h4>liste des colis :</h4>
            <ul class="list-group">
                @foreach($palette->colisage as $c)
                    <li class="list-group-item">{{$c->nbrcolis}} ,v: {{$c->versement}} </li>
                @endforeach

            </ul>
        </div>




    </div>
@endsection
