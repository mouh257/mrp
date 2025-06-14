@extends('layouts.app')
@section('title')
    -> Modifier une livraison
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Modifier une livraison</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('livraison.index') }}"> Liste des livraisons</a>
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

        <form action="{{route('livraison.update',$livraison->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>N° Bon de Livraison
                    <input type="text" class="form-control" name="nbl" value="{{$livraison->nbl}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Date
                    <input type="date" class="form-control" name="date" value="{{$livraison->date}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Fournisseur
                    <select class="form-control" name="fournisseur_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($fournisseurs as $f)
                            <option value="{{$f->id}}"
                                {{ ( $f==$livraison->fournisseur) ? 'selected' : '' }}
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
                                {{ ( $a==$livraison->article) ? 'selected' : '' }}
                            > {{ $a->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Quantité
                    <input type="number" class="form-control" name="quantite" value="{{$livraison->quantite}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Commande
                    <select class="form-control" name="commande_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($commandes as $c)
                            <option value="{{$c->id}}"
                            @isset($livraison->commande_id)
                                {{ ( $c==$livraison->commande) ? 'selected' : '' }}
                                @endisset
                            > {{ $c->quantite }} / {{ $c->article->name }} commandé le {{ $c->date }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
