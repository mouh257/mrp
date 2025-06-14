@extends('layouts.app')
@section('title')
    -> Editer un article
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un article:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('article.index') }}"
                > Liste des articles</a>
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

        <form action="{{route('article.update',$article->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Culture
                <select class="form-control" name="group_id">
                    @foreach($groupes as $g)
                        <option value="{{$g->id}}"
                            {{ ( $g==$article->groupe) ? 'selected' : '' }}
                        > {{ $g->name }} </option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="mb-3">
                <label>Article
                    <input type="text" class="form-control" name="name"
                       value="{{$article->name}}">
                </label>
            </div>
            <div class="mb-3">
                <label >Stock minimum
                    <input type="number" class="form-control" name="stockmin"
                       value="{{$article->stockmin}}">
                </label>
            </div>

            <div class="mb-3">
                <label>Nbr /palette
                    <input type="number" class="form-control" name="nbrppal"
                       value="{{$article->nbrppal}}">
                </label>
            </div>

            <div class="mb-3">
                <label>Unité
                    <select class="form-control" name="unite">
                        <option value="unite"
                            {{ ( $article->unite=='unite') ? 'selected' : '' }}>Unité</option>
                        <option value="metre"
                            {{ ( $article->unite=='metre') ? 'selected' : '' }}>Metre</option>
                        <option value="litre"
                            {{ ( $article->unite=='litre') ? 'selected' : '' }}>Litre</option>
                        <option value="Kg"
                            {{ ( $article->unite=='Kg') ? 'selected' : '' }}>Kg</option>
                    </select>
                </label>
            </div>



            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
