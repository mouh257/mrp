@extends('layouts.app')
@section('title')
    -> Nouvelle facture
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle facture:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('facture.index') }}"> Liste des factures</a>
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

    <form action="{{route('facture.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° facture
                <input type="text" class="form-control" name="reference" placeholder="N° facture">
            </label>
        </div>
        <div class="mb-3">
            <label>Date
                <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
            </label>
        </div>
        <div class="mb-3">
            <label>Fournisseur
                <select class="form-control" name="fournisseur_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($fournisseurs as $f)
                        <option value="{{$f->id}}"> {{ $f->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="mb-3">
            <label>Montant
                <input type="number" class="form-control" name="montant" placeholder="Montant">
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
