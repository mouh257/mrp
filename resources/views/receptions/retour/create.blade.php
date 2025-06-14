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
               href="{{ route('retour.index') }}"
            > Liste des retours</a>
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

    <form action="{{route('retour.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>Réception
                <select class="form-control" name="reception_id">
                    <option disabled selected hidden >Choisir ...</option>
                    @foreach($receptions as $r)
                        <option value="{{$r->id}}">BL: {{ $r->nbl }} - {{ $r->culture->name  }}  - {{ $r->pdsnet }}kg</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="mb-3">
            <label>Poids retour
                <input type="number" class="form-control" name="pdsretour" placeholder="Poids retour">
            </label>
        </div>
        <div class="mb-3">
            <label>Raison
                <input type="text" class="form-control" name="raison" placeholder="Raison">
            </label>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
