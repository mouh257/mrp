@extends('layouts.app')
@section('title')
    -> Editer une culture
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une culture:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('culture.index') }}"> Liste des cultures</a>
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

        <form action="{{route('culture.update',$culture->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" value="{{$culture->name}}">
            </div>
            <div class="mb-3">
                <label for="verstart" class="form-label">Début</label>
                <input type="number" class="form-control" name="verstart" value="{{$culture->verstart}}">
            </div>
            <div class="mb-3">
                <label for="versend" class="form-label">Fin</label>
                <input type="number" class="form-control" name="versend" value="{{$culture->versend}}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
