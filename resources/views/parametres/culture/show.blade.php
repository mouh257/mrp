@extends('layouts.app')
@section('title')
    -> Fiche Culture
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Fiche Culture:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary"
                   href="{{ route('culture.index') }}"
                > Liste des cultures</a>
            </div>

        </div>
        <br>

        <div class="mb-3">
            <H4> Nom : {{$culture->name}}</H4>

        </div>
        <div class="mb-3">
            <h4>Versement : de  {{$culture->verstart}}  à  {{$culture->versend}} </h4>

        </div>

        <div class="mb-3">
            <h4>Variétés :</h4>
            <ul class="list-group">
                @foreach($culture->varietes as $v)
                    <li class="list-group-item">{{$v->name}}</li>
                @endforeach

            </ul>

        </div>

        <div class="mb-3">
            <h4>Coloration :</h4>
            <ul class="list-group">
                @foreach($culture->colorations as $c)
                    <li class="list-group-item">{{$c->name}}</li>
                @endforeach

            </ul>

        </div>

        <div class="mb-3">
            <h4>Calibres :</h4>
            <ul class="list-group">
                @foreach($culture->calibres as $c)
                    <li class="list-group-item">{{$c->name}}</li>
                @endforeach

            </ul>

        </div>


    </div>
@endsection
