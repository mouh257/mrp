@extends('layouts.app')
@section('title')
    -> Liste des colorations
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des colorations:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('coloration.create') }}"
                > Nouvelle coloration</a>
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
                @foreach($colorations as $c)

                    <tr>
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->name}}</td>
                        <td>{{$c->culture->name}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('coloration.show',$c->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('coloration.edit',$c->id)}}">Editer</a>
                                <form action="{{route('coloration.destroy',$c->id)}}" method="post">
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
                {!! $colorations->links() !!}
            </div>
        </div>
    </div>


@endsection


