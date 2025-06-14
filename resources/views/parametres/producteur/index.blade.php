@extends('layouts.app')
@section('title')
    -> Liste des producteurs
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des producteurs:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('producteur.create') }}"
                > Nouveau producteur</a>
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
                    <th scope="col">Ref</th>
                    <th scope="col">Name</th>
                    <th scope="col">GGN</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($producteur as $p)

                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td>{{$p->ref}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->ggn}}</td>
                        {{--
                         <td> <img src="/images/{{$item->image}}"></td>
                         --}}
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('producteur.show',$p->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('producteur.edit',$p->id)}}">Editer</a>

                                <form action="{{route('producteur.destroy',$p->id)}}" method="post">
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
                {!! $producteur->links() !!}
            </div>
        </div>
    </div>


@endsection


