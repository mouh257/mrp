@extends('layouts.app')
@section('title')
    -> Liste des produits finis
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des produits finis:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('produitfini.create') }}"
                > Nouveau produit fini</a>
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
                    <th scope="col">Pds Colis</th>
                    <th scope="col">Type Colis</th>

                    <th scope="col">Barq</th>
                    <th scope="col">Nbr Barq</th>
                    <th scope="col">Pds Barq</th>

                    <th scope="col">Etiq</th>
                    <th scope="col">Nbr étiq</th>

                    <th scope="col">Etiq2</th>
                    <th scope="col">Nbr étiq2</th>
                    <th scope="col" >Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($les_produitfinis as $pf)

                    <tr>
                        <th scope="row">{{$pf->id}}</th>
                        <td>{{$pf->name}}</td>
                        <td>{{$pf->culture->name}}</td>
                        <td>{{$pf->pdscolis}}</td>
                        <td>{{$pf->colis->name}}</td>
                        <td>
                            @isset($pf->barquette->name)
                                {{$pf->barquette->name}}
                            @else - @endisset
                        </td>
                        <td>{{$pf->nbrbrqtt}}</td>
                        <td>{{$pf->pdsbrqtt}}</td>


                        <td>
                            @isset($pf->etiquette->name)
                                {{$pf->etiquette->name}}
                            @else - @endisset
                        </td>
                        <td>{{$pf->nbretiq}}</td>
                        <td>
                            @isset($pf->etiquette2->name)
                                {{$pf->etiquette2->name}}
                            @else - @endisset
                        </td>
                        <td>{{$pf->nbretiq2}}</td>



                        <td style="max-width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('produitfini.show',$pf->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('produitfini.edit',$pf->id)}}">Editer</a>
                                <form action="{{route('produitfini.destroy',$pf->id)}}" method="post">
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
                {!! $les_produitfinis->links() !!}
            </div>
        </div>
    </div>


@endsection


