@extends('layouts.app')
@section('title')
    -> Liste des commandes
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des commandes:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('commande.create') }}"
                > Nouvelle commande</a>
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
                    <th scope="col">N° commande</th>
                    <th scope="col">Client</th>
                    <th scope="col">Nbr Colis</th>
                    <th scope="col">Produit fini</th>
                    <th scope="col">Observation</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commandes as $c)

                    <tr>
                        <th scope="row">{{$c->numcmd}}</th>
                        <td>{{$c->client}}</td>
                        <td>{{$c->nbrcolis}}</td>
                        <td>{{$c->produitfini->name}}</td>
                        <td>{{$c->observation}}</td>
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('commande.show',$c->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('commande.edit',$c->id)}}">Editer</a>

                                <form action="{{route('commande.destroy',$c->id)}}" method="post">
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
                {!! $commandes->links() !!}
            </div>
        </div>
    </div>


@endsection


