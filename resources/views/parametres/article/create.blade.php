@extends('layouts.app')
@section('title')
    -> Nouveau article
@endsection

@section('content')
<div class="container p-5">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Ajouter un nouveau article:</h2>
        </div>
        <div class="col">
            <a class="btn btn-secondary "
               href="{{ route('article.index') }}"
            > Liste des articles</a>
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

    <form action="{{route('article.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="group_id" class="form-label">Groupe</label>
            <select class="form-control" name="group_id">
                <option disabled selected hidden >Choisir ...</option>
                @foreach($groupes as $g)
                    <option value="{{$g->id}}"> {{ $g->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Article</label>
            <input type="text" class="form-control" name="name" placeholder="Nom d'article">
        </div>

        <div class="mb-3">
            <label for="stockmin" class="form-label">Stock minimum</label>
            <input type="number" class="form-control" name="stockmin" placeholder="Stock minimum">
        </div>

        <div class="mb-3">
            <label for="nbrppal" class="form-label">Nbr /palette</label>
            <input type="number" class="form-control" name="nbrppal" placeholder="Nombre d'article par palette">
        </div>

        <div class="mb-3">
            <label for="unite" class="form-label">Unité</label>
            <select class="form-control" name="unite">
                <option value="unite">Unité</option>
                <option value="metre">Metre</option>
                <option value="litre">Litre</option>
                <option value="Kg">Kg</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection
