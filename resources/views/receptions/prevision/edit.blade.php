@extends('layouts.app')
@section('title')
    -> Editer une prévision
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une prévision:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('prevision.index') }}"
                > Liste des prévisions</a>
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

        <form action="{{route('prevision.update',$prevision->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Date prévision
                    <input type="date" class="form-control" name="dateprevision" value="{{$prevision->dateprevision}}">
                </label>
            </div>

            <div class="mb-3">
                <label>Ferme
                <select class="form-control" name="ferme_id">
                    @foreach($fermes as $f)
                        <option value="{{$f->id}}"
                            {{ ( $f==$prevision->ferme) ? 'selected' : '' }}
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
                            {{ ( $c==$prevision->culture) ? 'selected' : '' }}
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
                            {{ ( $v==$prevision->variete) ? 'selected' : '' }}
                        > {{ $v->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="mb-3">
                <label>Poids prévu de la récolte
                    <input type="number" class="form-control" name="pdsprevu" value="{{$prevision->pdsprevu}}">
                </label>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
