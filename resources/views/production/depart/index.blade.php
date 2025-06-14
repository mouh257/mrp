@extends('layouts.app')
@section('title')
    -> Liste des departs
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des departs:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('depart.create') }}"
                > Nouveau depart</a>
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
                    <th scope="col">N° Exp.</th>
                    <th scope="col">Date depart</th>
                    <th scope="col">Tracteur</th>
                    <th scope="col">Remorque</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departs as $d)

                    <tr>
                        <th scope="row">{{$d->numexp}}</th>
                        <td>{{$d->datedepart}}</td>
                        <td>{{$d->tracteur}}</td>
                        <td>{{$d->remorque}}</td>
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('depart.show',$d->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('depart.edit',$d->id)}}">Editer</a>

                                <form action="{{route('depart.destroy',$d->id)}}" method="post">
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
                {!! $departs->links() !!}
            </div>
        </div>
    </div>


@endsection


