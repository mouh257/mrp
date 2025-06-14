@extends('layouts.app')
@section('title')
    -> Liste des réception
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des réceptions:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('reception.create') }}"
                > Nouvelle réception</a>
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
                    <th scope="col">Versement</th>
                    <th scope="col">Ferme</th>
                    <th scope="col">Culture</th>
                    <th scope="col">Variété</th>
                    <th scope="col">Poids Net</th>

                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($receptions as $r)

                    <tr>
                        <th scope="row">{{$r->versement}}</th>
                        <td>{{$r->ferme->name}}</td>
                        <td>{{$r->culture->name}}</td>
                        <td>{{$r->variete->name}}</td>
                        <td>{{$r->pdsnet}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('reception.show',$r->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('reception.edit',$r->id)}}">Editer</a>
                                <form action="{{route('reception.destroy',$r->id)}}" method="post">
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
                {!! $receptions->links() !!}
            </div>
        </div>
    </div>


@endsection


