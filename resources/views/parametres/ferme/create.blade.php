@extends('layouts.app')
@section('title')
    -> Nouvelle Ferme
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle ferme:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('ferme.index') }}"> Liste des fermes</a>
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

    <form action="{{route('ferme.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="producteur_id" class="form-label">Producteur</label>
            <select class="form-control" name="producteur_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($producteurs as $p)
                    <option value="{{$p->id}}"> {{ $p->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" placeholder="Nom">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" placeholder="facultatif">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
