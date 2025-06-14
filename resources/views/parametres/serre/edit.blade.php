@extends('layouts.app')
@section('title')
    -> Editer une serre
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une serre:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('serre.index') }}"
                > Liste des serres</a>
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

        <form action="{{route('serre.update',$serre->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="ferme_id" class="form-label">Ferme</label>
                <select class="form-control" name="ferme_id">
                    @foreach($fermes as $f)
                        <option value="{{$f->id}}"
                            {{ ( $f==$serre->ferme) ? 'selected' : '' }}
                        > {{ $f->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name"
                       value="{{$serre->name}}">
            </div>
            <div class="mb-3">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="text" class="form-control" name="superficie"
                       value="{{$serre->superficie}}">
            </div>
            <div class="mb-3">
                <label for="culture_id" class="form-label">Culture</label>
                <select class="form-control" name="culture_id">
                    @foreach($cultures as $c)
                        <option value="{{$c->id}}"
                            {{ ( $c==$serre->culture) ? 'selected' : '' }}
                        > {{ $c->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="variete_id" class="form-label">Variete</label>
                <select class="form-control" name="variete_id">
                    @foreach($varietes as $v)
                        <option value="{{$v->id}}"
                            {{ ( $v==$serre->variete) ? 'selected' : '' }}
                        > {{ $v->name }} </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
