@extends('layouts.app')
@section('title')
    -> Liste des retours
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des retours:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('sortie.create') }}"
                > Nouveau retour</a>
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
                    <th scope="col">Date</th>
                    <th scope="col">Fournisseur</th>
                    <th scope="col">Article</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sorties as $i)

                    <tr>
                        <th scope="row">{{$i->nbs}}</th>
                        <td>{{$i->date}}</td>
                        <td>{{$i->fournisseur->name}}</td>
                        <td>{{$i->article->name}}</td>
                        <td>{{$i->quantite}}</td>

                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('sortie.show',$i->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('sortie.edit',$i->id)}}">Editer</a>

                                <form action="{{route('sortie.destroy',$i->id)}}" method="post">
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
                {!! $sorties->links() !!}
            </div>
        </div>
    </div>


@endsection


