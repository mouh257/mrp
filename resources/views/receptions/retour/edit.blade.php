@extends('layouts.app')
@section('title')
    -> Editer un retour
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un retour:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('retour.index') }}"
                > Liste des retours</a>
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

        <form action="{{route('retour.update',$retour->id)}}" method="post">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label>Réception
                <select class="form-control" name="reception_id">
                    @foreach($receptions as $r)
                        <option value="{{$r->id}}"
                            {{ ( $r==$retour->reception) ? 'selected' : '' }}
                        > BL: {{ $r->nbl }} - {{ $r->culture->name  }}  - {{ $r->pdsnet }}kg </option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="mb-3">
                <label>Poids retour
                    <input type="number" class="form-control" name="pdsretour" value="{{$retour->pdsretour}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Raison
                    <input type="text" class="form-control" name="raison" value="{{$retour->raison}}">
                </label>
            </div>



            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
