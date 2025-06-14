@extends('layouts.app')
@section('title')
    -> Liste des prévisions
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des prévisions:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('prevision.create') }}"
                > Nouvelle prévision</a>
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
                    <th scope="col">Date prévision</th>
                    <th scope="col">Ferme</th>
                    <th scope="col">Culture</th>
                    <th scope="col">Variété</th>
                    <th scope="col">Pds Prévu</th>

                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($previsions as $r)

                    <tr>
                        <th scope="row">{{$r->dateprevision}}</th>
                        <td>{{$r->ferme->name}}</td>
                        <td>{{$r->culture->name}}</td>
                        <td>{{$r->variete->name}}</td>
                        <td>{{$r->pdsprevu}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('prevision.show',$r->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('prevision.edit',$r->id)}}">Editer</a>
                                <form action="{{route('prevision.destroy',$r->id)}}" method="post">
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
                {!! $previsions->links() !!}
            </div>
        </div>
    </div>


@endsection


