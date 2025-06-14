@extends('layouts.app')
@section('title')
    -> Fiche calibre
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche calibre:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('calibre.index') }}"
                > Liste des calibres</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$calibre->name}}</H4>
        </div>
        <div class="mb-3">
            <h5>Culture : {{$calibre->culture->name}}</h5>
        </div>

    </div>
@endsection
