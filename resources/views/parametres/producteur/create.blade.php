@extends('layouts.app')
@section('title')
    -> Nouveau producteur
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau producteur:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('producteur.index') }}"> Liste des producteurs</a>
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

    <form action="{{route('producteur.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>Nom
                <input type="text" class="form-control" name="name" placeholder="Nom">
            </label>
        </div>
        <div class="mb-3">
            <label>Réf.
                <input type="text" class="form-control" name="ref" placeholder="Référence">
            </label>
        </div>
        <div class="mb-3">
            <label>GGN
                <input type="number" class="form-control" name="ggn" placeholder="GGN">
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
