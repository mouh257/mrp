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
               href="{{ route('palette.index') }}"> Liste des palettes</a>
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

    <form action="{{route('palette.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° palette
                <input type="number" class="form-control" name="numpal" placeholder="N° palette">
            </label>
        </div>
        <div class="mb-3">
            <label>N° commande
                <input type="number" class="form-control" name="numcmd" placeholder="N° commande">
            </label>
        </div>
        <div class="mb-3">
            <label>Depart / Expedition
                <select class="form-control" name="depart_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($departs as $d)
                        <option value="{{$d->id}}"> {{ $d->numexp }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Type Palette
                <select class="form-control" name="typpal_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($articles as $a)
                        <option value="{{$a->id}}"> {{ $a->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
