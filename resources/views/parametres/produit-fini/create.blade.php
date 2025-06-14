@extends('layouts.app')
@section('title')
    -> Nouveau produit fini
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau produit fini:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('produitfini.index') }}"
            > Liste des produits finis</a>
        </div>

    </div>

    <br>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $er)
                    <li>{{ $er }} </li>
                @endforeach
            </ul>
        </div>
        <br>
    @endif

    <form action="{{route('produitfini.store')}}" method="post" class="row g-3">
        @csrf

        <div class="col-md-4">
            <label for="culture_id" class="form-label">Culture</label>
            <select class="form-control" name="culture_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_cultures as $c)
                    <option value="{{$c->id}}"> {{ $c->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="name" class="form-label">Designation</label>
            <input type="text" class="form-control" name="name" placeholder="Designation">
        </div>

        <div class="col-md-4">
            <label for="colis_id" class="form-label">Type colis</label>
            <select class="form-control" name="colis_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_colis as $c)
                    <option value="{{$c->id}}"> {{ $c->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="pdscolis" class="form-label">Poids Colis</label>
            <input type="number" min=1 max=8 class="form-control" name="pdscolis" placeholder="Poids net en Kg">
        </div>

        <div class="col-md-4">
            <label for="brqtt_id" class="form-label">Type Barquette</label>
            <select class="form-control" name="brqtt_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_barquettes as $b)
                    <option value="{{$b->id}}"> {{ $b->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="nbrbrqtt" class="form-label">Nbr barquettes / Colis</label>
            <input type="number" min=0 max=20 class="form-control" name="nbrbrqtt" placeholder="Nbr par colis">
        </div>
        <div class="col-md-4">
            <label for="pdsbrqtt" class="form-label">Poids Barquette</label>
            <input type="number" min=125 max=500 class="form-control" name="pdsbrqtt" placeholder="Poids en gr">
        </div>

        <div class="col-md-4">
            <label for="couv_id" class="form-label">Type couvercle</label>
            <select class="form-control" name="couv_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_couvercles as $c)
                    <option value="{{$c->id}}"> {{ $c->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="stab_id" class="form-label">Type Stabilisateur</label>
            <select class="form-control" name="stab_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_stabilisateurs as $s)
                    <option value="{{$s->id}}"> {{ $s->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="etiq_id" class="form-label">Type Etiquette</label>
            <select class="form-control" name="etiq_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_etiquettes as $e)
                    <option value="{{$e->id}}"> {{ $e->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="nbretiq" class="form-label">Nbr étiquettes / Colis</label>
            <input type="number" min=0 max=21 class="form-control" name="nbretiq" placeholder="Nbr par colis">
        </div>

        <div class="col-md-4">
            <label for="etiq2_id" class="form-label">Type 2eme étiquette</label>
            <select class="form-control" name="etiq2_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($les_etiquettes as $e)
                    <option value="{{$e->id}}"> {{ $e->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="nbretiq2" class="form-label">Nbr 2eme étiquettes / Colis</label>
            <input type="number" min=0 max=21 class="form-control" name="nbretiq2" placeholder="Nbr par colis">
        </div>


        <button type="submit" class="btn btn-primary col-md-8">Enregistrer</button>

    </form>

</div>
@endsection
