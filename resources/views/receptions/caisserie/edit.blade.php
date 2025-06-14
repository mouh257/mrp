@extends('layouts.app')
@section('title')
    -> Editer un mouvement de caisse
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un mouvement de caisse:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('caisserie.index') }}"
                > Liste des mouvements de caisse</a>
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

        <form action="{{route('caisserie.update',$caisserie->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Ferme
                <select class="form-control" name="ferme_id">
                    @foreach($fermes as $f)
                        <option value="{{$f->id}}"
                            {{ ( $f==$caisserie->ferme) ? 'selected' : '' }}
                        > {{ $f->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="mb-3">
                <label>N° Bon de sortie
                    <input type="number" class="form-control" name="nbs" value="{{$caisserie->nbs}}">
                </label>
            </div>

            <div class="mb-3">
                <label>Nbr de caisse sortie
                    <input type="number" class="form-control" name="nbrcaissue" value="{{$caisserie->nbrcaisse}}">
                </label>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
