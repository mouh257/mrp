@extends('layouts.app')
@section('title')
    -> Editer une palette
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une palette:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('palette.index') }}"> Liste des palettes</a>
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

        <form action="{{route('palette.update',$palette->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>N° palette
                    <input type="number" class="form-control" name="numpal" value="{{$palette->numpal}}">
                </label>
            </div>
            <div class="mb-3">
                <label>N° commande
                    <input type="number" class="form-control" name="numcmd" value="{{$palette->numcmd}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Depart / Expedition
                    <select class="form-control" name="depart_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($departs as $d)
                            <option value="{{$d->id}}"
                                {{ ( $d==$palette->depart) ? 'selected' : '' }}
                            > {{ $d->numexp }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Type Palette
                    <select class="form-control" name="typpal_id">
                        <option disabled selected hidden >Choisir ...</option>
                        @foreach($articles as $a)
                            <option value="{{$a->id}}"
                                {{ ( $a==$palette->typePalette) ? 'selected' : '' }}
                            > {{ $a->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Cornier
                    <input type="number" class="form-control" name="cornier" value="{{$palette->cornier}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Feuillard
                    <input type="number" class="form-control" name="feuillard" value="{{$palette->feuillard}}">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
