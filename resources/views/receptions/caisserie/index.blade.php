@extends('layouts.app')
@section('title')
    -> Mouvement de caisse
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Mouvement de caisse</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('caisserie.create') }}"
                > Nouvelle sortie</a>
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
                    <th scope="col">N° BS</th>
                    <th scope="col">Ferme</th>
                    <th scope="col">Nbr caisse</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($caisseries as $r)

                    <tr>
                        <th scope="row">{{$r->nbs}}</th>
                        <td>{{$r->ferme->name}}</td>
                        <td>{{$r->nbrcaisse}}</td>
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('caisserie.show',$r->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('caisserie.edit',$r->id)}}">Editer</a>
                                <form action="{{route('caisserie.destroy',$r->id)}}" method="post">
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
                {!! $caisseries->links() !!}
            </div>
        </div>
    </div>


@endsection


