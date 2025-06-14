@extends('layouts.app')
@section('title')
    -> Liste des fermes
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des fermes:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('ferme.create') }}"
                > Nouvelle ferme</a>
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
                    <th scope="col">Producteur</th>
                    <th scope="col">Adresse</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fermes as $f)

                    <tr>
                        <th scope="row">{{$f->id}}</th>
                        <td>{{$f->name}}</td>
                        <td>{{$f->producteur->name}}</td>
                        <td>{{$f->adresse}}</td>

                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('ferme.show',$f->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('ferme.edit',$f->id)}}">Editer</a>
                                <form action="{{route('ferme.destroy',$f->id)}}" method="post">
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
                {!! $fermes->links() !!}
            </div>
        </div>
    </div>


@endsection


