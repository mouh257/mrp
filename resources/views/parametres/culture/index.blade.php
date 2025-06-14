@extends('layouts.app')
@section('title')
    -> Liste des cultures
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des cultures:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('culture.create') }}"
                > Nouvelle culture</a>
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
                    <th scope="col">De :</th>
                    <th scope="col">à :</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($culture as $c)

                    <tr>
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->name}}</td>
                        <td>{{$c->verstart}}</td>
                        <td>{{$c->versend}}</td>
                        {{--
                         <td> <img src="/images/{{$item->image}}"></td>
                         --}}
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">

                                <a class="btn btn-info" href="{{route('culture.show',$c->id)}}">Afficher</a>

                                <a class="btn btn-warning" href="{{route('culture.edit',$c->id)}}">Editer</a>

                                <form action="{{route('culture.destroy',$c->id)}}" method="post">
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
                {!! $culture->links() !!}
            </div>
        </div>
    </div>


@endsection


