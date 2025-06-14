@extends('layouts.app')
@section('title')
    -> Editer un producteur
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un producteur:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('producteur.index') }}"> Liste des producteurs</a>
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

        <form action="{{route('producteur.update',$producteur->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nom
                    <input type="test" class="form-control" name="name" value="{{$producteur->name}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Réf.
                    <input type="test" class="form-control" name="ref" value="{{$producteur->ref}}">
                </label>
            </div>
            <div class="mb-3">
                <label>GGN
                    <input type="test" class="form-control" name="ggn" value="{{$producteur->ggn}}">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
