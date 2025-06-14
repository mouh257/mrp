@extends('layouts.app')
@section('title')
    -> Nouvelle palette
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle palette:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('colisage.index') }}"> Liste des palettes</a>
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

    <form action="{{route('colisage.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° versement
                <input type="number" min="1" max="99999" class="form-control" name="versement" placeholder="N° versement">
            </label>
        </div>
        <div class="mb-3">
            <label>Nbr Colis
                <input type="number" min="1" max="660" class="form-control" name="nbrcolis" placeholder="Nbr Colis">
            </label>
        </div>
        <div class="mb-3">
            <label>Produit fini
                <select class="form-control" name="produitfini_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($produitsfinis as $pf)
                        <option value="{{$pf->id}}"> {{ $pf->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Calibre
                <select class="form-control" name="calibre_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($calibres as $c)
                        <option value="{{$c->id}}"> {{ $c->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Coloration
                <select class="form-control" name="coloration_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($colorations as $c)
                        <option value="{{$c->id}}"> {{ $c->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Variété
                <select class="form-control" name="variete_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($varietes as $v)
                        <option value="{{$v->id}}"> {{ $v->name }} </option>
                    @endforeach
                </select>
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
