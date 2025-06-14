@extends('layouts.app')
@section('title')
    -> Nouvelle sortie
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau mouvement de caisse :</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('caisserie.index') }}"
            > Liste des mouvements de caisse</a>
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

    <form action="{{route('caisserie.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>Ferme
                <select class="form-control" name="ferme_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($fermes as $f)
                        <option value="{{$f->id}}"> {{ $f->name }} </option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="mb-3">
            <label>N° Bon de sortie
                <input type="number" class="form-control" name="nbs" placeholder="N° Bon">
            </label>
        </div>

        <div class="mb-3">
            <label>Nbr de caisse sortie
                <input type="number" class="form-control" name="nbrcaisse" placeholder="Nbr de caisse">
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
