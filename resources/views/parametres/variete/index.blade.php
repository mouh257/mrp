@extends('layouts.app')
@section('title')
    -> Liste des variétés
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des variétés:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('variete.create') }}"
                > Nouvelle variété</a>
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
                    <th scope="col">Culture</th>

                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($varietes as $v)

                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{$v->culture->name}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('variete.show',$v->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('variete.edit',$v->id)}}">Editer</a>
                                <form action="{{route('variete.destroy',$v->id)}}" method="post">
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
                {!! $varietes->links() !!}
            </div>
        </div>
    </div>


@endsection


