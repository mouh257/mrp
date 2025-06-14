@extends('layouts.app')
@section('title')
    -> Fiche groupe d'article
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche groupe d'article:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('groupedarticle.index') }}"
                > Liste des groupes d'article</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$groupedarticle->name}}</H4>

        </div>
        <div class="mb-3">
            <h4>Description :</h4>
                <h5> groupe d'article d'emballage de même famille</h5>

        </div>



    </div>
@endsection
