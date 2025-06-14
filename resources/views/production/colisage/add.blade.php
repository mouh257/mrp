@extends('layouts.app')
@section('title')
    -> Ajouter une ligne a la palette
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-10">
                <h2>Ajouter une ligne a la palette:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('colisage.index') }}"> Liste des colis</a>
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

        <form action="{{route('colisage.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label>N° Serie
                    <input type="number" class="form-control" name="palette_id"  value="{{$colisage->palette_id}}">
                </label>
            </div>

            <div class="mb-3">
                <label>N° versement
                    <input type="number" class="form-control" name="versement" value="">
                </label>
            </div>
            <div class="mb-3">
                <label>Nbr Colis
                    <input type="number" class="form-control" name="nbrcolis" value="">
                </label>
            </div>
            <div class="mb-3">
                <label>Produit fini
                    <select class="form-control" name="produitfini_id" >
                        @foreach($produitsfinis as $pf)
                            <option value="{{$pf->id}}"
                                {{ ( $pf==$colisage->produitfini) ? 'selected' : '' }}
                            > {{ $pf->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Calibre
                    <select class="form-control" name="calibre_id">

                        @foreach($calibres as $c)
                            <option value="{{$c->id}}"
                                {{ ( $c==$colisage->calibre) ? 'selected' : '' }}
                            > {{ $c->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Coloration
                    <select class="form-control" name="coloration_id">

                        @foreach($colorations as $c)
                            <option value="{{$c->id}}"
                                {{ ( $c==$colisage->coloration) ? 'selected' : '' }}
                            > {{ $c->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Variété
                    <select class="form-control" name="variete_id">
                        <option disabled selected hidden >Choisir une variété</option>
                        @foreach($varietes as $v)
                            <option value="{{$v->id}}"
                                {{ ( $v==$colisage->variete) ? 'selected' : '' }}
                            > {{ $v->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Observation
                    <input type="text" class="form-control" name="observation" value="{{$colisage->observation}}">
                </label>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>

        </form>

    </div>
@endsection
