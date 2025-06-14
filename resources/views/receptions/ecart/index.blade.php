@extends('layouts.app')
@section('title')
    -> Liste des écarts
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des écarts:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('ecart.create') }}"
                > Nouveau écart</a>
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
                        <th scope="col">Pds Récep.</th>
                        <th scope="col">Pds Ecart</th>

                        <th scope="col" >Actions :</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ecarts as $r)

                    <tr>
                        <th scope="row">{{$r->reception->versement}}</th>
                        <td>{{$r->reception->ferme->name}}</td>
                        <td>{{$r->reception->culture->name}}</td>
                        <td>{{$r->reception->variete->name}}</td>
                        <td>{{$r->reception->pdsnet}}</td>
                        <td>{{$r->pdsecart}}</td>

                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('ecart.show',$r->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('ecart.edit',$r->id)}}">Editer</a>
                                <form action="{{route('ecart.destroy',$r->id)}}" method="post">
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
                {!! $ecarts->links() !!}
            </div>
        </div>
    </div>


@endsection


