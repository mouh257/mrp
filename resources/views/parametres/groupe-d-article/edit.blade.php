@extends('layouts.app')
@section('title')
    -> Editer un groupe d'article
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un groupe d'article:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('groupedarticle.index') }}">
                    Liste des groupes d'article</a>
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

        <form action="{{route('groupedarticle.update',$groupedarticle->id)}}"
              method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" value="{{$groupedarticle->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
