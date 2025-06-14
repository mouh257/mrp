@extends('layouts.app')
@section('title')
    -> Editer un fournisseur
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un fournisseur:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('fournisseur.index') }}">
                    Liste des fournisseurs</a>
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

        <form action="{{route('fournisseur.update',$fournisseur->id)}}"
              method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" value="{{$fournisseur->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
