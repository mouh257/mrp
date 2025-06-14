@extends('layouts.app')
@section('title')
    -> Liste des groupes d'articles
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des groupes d'articles:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('groupedarticle.create') }}"
                > Nouveau groupe d'article</a>
            </div>
        </div>
        <br>
        @if($message=Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark" >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groupedarticle as $ga)

                    <tr>
                        <th scope="row">{{$ga->id}}</th>
                        <td>{{$ga->name}}</td>

                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">

                                <a class="btn btn-info" href="{{route('groupedarticle.show',$ga->id)}}">Afficher</a>

                                <a class="btn btn-warning" href="{{route('groupedarticle.edit',$ga->id)}}">Editer</a>

                                <form action="{{route('groupedarticle.destroy',$ga->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $groupedarticle->links() !!}
            </div>
        </div>
    </div>


@endsection


