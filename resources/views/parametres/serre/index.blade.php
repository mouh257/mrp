@extends('layouts.app')
@section('title')
    -> Liste des serres
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des serres:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('serre.create') }}"
                > Nouvelle serre</a>
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
                    <th scope="col">Superficie</th>
                    <th scope="col">Ferme</th>
                    <th scope="col">Culture</th>
                    <th scope="col">Variété</th>

                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($serres as $s)

                    <tr>
                        <th scope="row">{{$s->id}}</th>
                        <td>{{$s->name}}</td>
                        <td>{{$s->superficie}}</td>
                        <td>{{$s->ferme->name}}</td>
                        <td>{{$s->culture->name}}</td>
                        <td>{{$s->variete->name}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('serre.show',$s->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('serre.edit',$s->id)}}">Editer</a>
                                <form action="{{route('serre.destroy',$s->id)}}" method="post">
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
                {!! $serres->links() !!}
            </div>
        </div>
    </div>


@endsection


