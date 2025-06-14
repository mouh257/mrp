@extends('layouts.app')
@section('title')
    -> Fiche depart
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche depart:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('depart.index') }}"
                > Liste des departs</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> N° d'expédition: {{$depart->numexp}} , date depart : {{$depart->datedepart}} , Immat. remorque : {{$depart->remorque}}</H4>
        </div>

        <div class="mb-3">
            <h4>liste des palettes :</h4>
            <ul class="list-group">
                @foreach($depart->palettes as $p)
                    <li class="list-group-item">{{$p->seriepal}} - {{$p->numpal}} - {{$p->numcmd}}</li>
                @endforeach

            </ul>
        </div>




    </div>
@endsection
