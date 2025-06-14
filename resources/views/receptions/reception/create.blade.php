@extends('layouts.app')
@section('title')
    -> Nouvelle Réception
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle réception:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('reception.index') }}"
            > Liste des réceptions</a>
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

    <form action="{{route('reception.store')}}" method="post">
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
            <label>Culture
                <select class="form-control" name="culture_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($cultures as $c)
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
            <label>Versement
                <input type="number" class="form-control" name="versement" placeholder="Versement">
            </label>
        </div>
        <div class="mb-3">
            <label>Nbr Caisse
                <input type="number" class="form-control" name="nbrcaisse" placeholder="nbr de caisse">
            </label>
        </div>
        <div class="mb-3">
            <label>N° BL
                <input type="number" class="form-control" name="nbl" placeholder="N° BL">
            </label>
        </div>
        <div class="mb-3">
            <label>N° BR
                <input type="number" class="form-control" name="nbr" placeholder="N° BR">
            </label>
        </div>
        <div class="mb-3">
            <label>Poids Brut
                <input type="number" class="form-control" name="pdsbrut" placeholder="Poids brut">
            </label>
        </div>
        <div class="mb-3">
            <label>Poids Net
                <input type="number" class="form-control" name="pdsnet" placeholder="Poids net">
            </label>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
