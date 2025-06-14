@extends('layouts.app')
@section('title')
    -> Modifier une commande
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Modifier une commande</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
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

        <form action="{{route('commande.update',$commande->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>N° commande
                    <input type="number" class="form-control" name="numcmd" value="{{$commande->numcmd}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Client
                    <input type="text" class="form-control" name="client" value="{{$commande->client}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Date fabrication
                    <input type="date" class="form-control" name="datefab" value="{{$commande->datefab}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Nbr Colis
                    <input type="number" class="form-control" name="nbrcolis" value="{{$commande->nbrcolis}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Produit fini
                    <select class="form-control" name="produitfini_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($produitsfinis as $pf)
                            <option value="{{$pf->id}}"
                                {{ ( $pf==$commande->produitfini) ? 'selected' : '' }}
                            >  {{ $pf->culture->name }} - {{ $pf->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Nbr palette
                    <input type="number" class="form-control" name="nbrpal" value="{{$commande->nbrpal}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Observation
                    <input type="text" class="form-control" name="observation" value="{{$commande->observation}}">
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
