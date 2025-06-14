@extends('layouts.app')
@section('title')
    -> Nouveau retour
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau retour:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('sortie.index') }}"> Liste des retours</a>
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

    <form action="{{route('sortie.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° Bon de Sortie
                <input type="text" class="form-control" name="nbs" placeholder="N° BS">
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
            <label>Article
                <select class="form-control" name="article_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($articles as $a)
                        <option value="{{$a->id}}"> {{ $a->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Quantité
                <input type="number" class="form-control" name="quantite" placeholder="Quantité">
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
