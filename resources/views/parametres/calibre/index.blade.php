@extends('layouts.app')
@section('title')
    -> Liste des calibres
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des calibres:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('calibre.create') }}"
                > Nouveau calibre</a>
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
                    <th scope="col">Calibre</th>
                    <th scope="col">Culture</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($calibres as $c)

                    <tr>
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->name}}</td>
                        <td>{{$c->culture->name}}</td>


                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('calibre.show',$c->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('calibre.edit',$c->id)}}">Editer</a>
                                <form action="{{route('calibre.destroy',$c->id)}}" method="post">
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
                {!! $calibres->links() !!}
            </div>
        </div>
    </div>


@endsection


