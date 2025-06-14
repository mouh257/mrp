@extends('layouts.app')
@section('title')
    -> Nouvelle prévision
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter une nouvelle prévision:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('prevision.index') }}"
            > Liste des prévisions</a>
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

    <form action="{{route('prevision.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>Date prévision
                <input type="date" class="form-control" name="dateprevision" value={{date("Y-m-d")}}>
            </label>
        </div>

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
            <label>Poids prévu de la récolte
                <input type="number" class="form-control" name="pdsprevu" placeholder="Poids prévu">
            </label>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
