@extends('layouts.app')
@section('title')
    -> Nouveau depart
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau depart:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('depart.index') }}"> Liste des departs</a>
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

    <form action="{{route('depart.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>N° Exp
                <input type="text" class="form-control" name="numexp" placeholder="N° expidition">
            </label>
        </div>
        <div class="mb-3">
            <label>Date depart
                <input type="date" class="form-control" name="datedepart" value="{{date('Y-m-d')}}">
            </label>
        </div>
        <div class="mb-3">
            <label>N° Immat. Tracteur
                <input type="text" class="form-control" name="tracteur" placeholder="Immat. tracteur">
            </label>
        </div>
        <div class="mb-3">
            <label>N° Immat. Remorque
                <input type="text" class="form-control" name="remorque" placeholder="Immat. remorque">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
