@extends('layouts.app')
@section('title')
    -> Editer une ligne de palette
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une ligne de palette:</h2>
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

        <form action="{{route('colisage.update',$colisage->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>N° versement
                    <input type="number" class="form-control" name="versement" value="{{$colisage->versement}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Nbr Colis
                    <input type="number" class="form-control" name="nbrcolis" value="{{$colisage->nbrcolis}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Produit fini
                    <select class="form-control" name="produitfini_id">
                        <option disabled selected hidden >Choisir ...</option>
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
                        <option disabled selected hidden >Choisir ...</option>
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
                        <option disabled selected hidden >Choisir ...</option>
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
                        <option disabled selected hidden >Choisir ...</option>
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

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
