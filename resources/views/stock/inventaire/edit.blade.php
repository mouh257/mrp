@extends('layouts.app')
@section('title')
    -> Modifier un inventaire
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Modifier un inventaire</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('inventaire.index') }}"> Liste des inventaires</a>
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

        <form action="{{route('inventaire.update',$inventaire->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Date
                    <input type="date" class="form-control" name="date" value="{{$inventaire->date}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Fournisseur
                    <select class="form-control" name="fournisseur_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($fournisseurs as $f)
                            <option value="{{$f->id}}"
                                {{ ( $f==$inventaire->fournisseur) ? 'selected' : '' }}
                            > {{ $f->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Article
                    <select class="form-control" name="article_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($articles as $a)
                            <option value="{{$a->id}}"
                                {{ ( $a==$inventaire->article) ? 'selected' : '' }}
                            > {{ $a->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Quantité
                    <input type="number" class="form-control" name="quantite" value="{{$inventaire->quantite}}">
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
