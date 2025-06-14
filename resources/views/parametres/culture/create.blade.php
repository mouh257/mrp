@extends('layouts.app')
@section('title')
    -> Nouvelle Culture
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle Culture:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('culture.index') }}"> Liste des cultures</a>
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

    <form action="{{route('culture.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" placeholder="Nom">
        </div>
        <div class="mb-3">
            <label for="verstart" class="form-label">Réf.</label>
            <input type="number" class="form-control" name="verstart" placeholder="Début">
        </div>
        <div class="mb-3">
            <label for="versend" class="form-label">GGN</label>
            <input type="number" class="form-control" name="versend" placeholder="Fin">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
