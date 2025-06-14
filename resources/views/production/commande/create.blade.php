@extends('layouts.app')
@section('title')
    -> Nouvelle commande
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle commande:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('commande.index') }}"> Liste des commandes</a>
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

    <form action="{{route('commande.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° commande
                <input type="number" class="form-control" name="numcmd" placeholder="N° commande">
            </label>
        </div>
        <div class="mb-3">
            <label>Client
                <input type="text" class="form-control" name="client" placeholder="Client">
            </label>
        </div>
        <div class="mb-3">
            <label>Date fabrication
                <input type="date" class="form-control" name="datefab" value="{{date('Y-m-d')}}">
            </label>
        </div>
        <div class="mb-3">
            <label>Nbr de colis total
                <input type="number" class="form-control" name="nbrcolis" placeholder="Nbr Colis total">
            </label>
        </div>
        <div class="mb-3">
            <label>Produit fini
                <select class="form-control" name="produitfini_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($produitsfinis as $pf)
                        <option value="{{$pf->id}}"> {{ $pf->culture->name }} - {{ $pf->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Nbr palette
                <input type="number" class="form-control" name="nbrpal" placeholder="Nbr palette">
            </label>
        </div>
        <div class="mb-3">
            <label>Observation
                <input type="text" class="form-control" name="observation" placeholder="Observation">
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
