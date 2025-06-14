@extends('layouts.app')
@section('title')
    -> Nouvelle Variété
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle variété:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('variete.index') }}"
            > Liste des Variétés</a>
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

    <form action="{{route('variete.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="culture_id" class="form-label">Culture</label>
            <select class="form-control" name="culture_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($cultures as $c)
                    <option value="{{$c->id}}"> {{ $c->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" placeholder="Nom">
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
