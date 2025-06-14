@extends('layouts.app')
@section('title')
    -> Nouveau Fournisseur
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau fournisseur:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('fournisseur.index') }}"> Liste des fournisseurs</a>
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

    <form action="{{route('fournisseur.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" placeholder="Nom">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
