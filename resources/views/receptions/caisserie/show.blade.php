@extends('layouts.app')
@section('title')
    -> Fiche caisserie
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche caisserie:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('caisserie.index') }}"
                > Liste des mouvements de caisse</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4><b>N° Bon de sortie : </b>{{$caisserie->nbs}} <b>pour la ferme :</b> {{$caisserie->ferme->name}}</H4>
        </div>

        <div class="mb-3">
            <h5><b>Nbr de caisse sortie : </b>{{$caisserie->nbrcaisse}} </h5>
        </div>


    </div>
@endsection
