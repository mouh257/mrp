@extends('layouts.app')
@section('title')
    -> Editer une réception
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une réception:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('reception.index') }}"
                > Liste des réceptions</a>
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

        <form action="{{route('reception.update',$reception->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Ferme
                <select class="form-control" name="ferme_id">
                    @foreach($fermes as $f)
                        <option value="{{$f->id}}"
                            {{ ( $f==$reception->ferme) ? 'selected' : '' }}
                        > {{ $f->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Culture
                <select class="form-control" name="culture_id">
                    @foreach($cultures as $c)
                        <option value="{{$c->id}}"
                            {{ ( $c==$reception->culture) ? 'selected' : '' }}
                        > {{ $c->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Variété
                <select class="form-control" name="variete_id">
                    @foreach($varietes as $v)
                        <option value="{{$v->id}}"
                            {{ ( $v==$reception->variete) ? 'selected' : '' }}
                        > {{ $v->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>
            <div class="mb-3">
                <label>Versement
                    <input type="number" class="form-control" name="versement" value="{{$reception->versement}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Nbr Caisse
                    <input type="number" class="form-control" name="nbrcaisse" value="{{$reception->nbrcaisse}}">
                </label>
            </div>
            <div class="mb-3">
                <label>N° BL
                    <input type="number" class="form-control" name="nbl" value="{{$reception->nbl}}">
                </label>
            </div>
            <div class="mb-3">
                <label>N° BR
                    <input type="number" class="form-control" name="nbr" value="{{$reception->nbr}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Poids Brut
                    <input type="number" class="form-control" name="pdsbrut" value="{{$reception->pdsbrut}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Poids Net
                    <input type="number" class="form-control" name="pdsnet" value="{{$reception->pdsnet}}">
                </label>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
