@extends('layouts.app')
@section('title')
    -> Colisage
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-10">
                <h2>Liste des palettes:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="{{ route('colisage.create') }}" > Nouvelle palette</a>
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
                    <th scope="col">Série</th>
                    <th scope="col">Versement</th>
                    <th scope="col">Nbr Colis</th>
                    <th scope="col">Produit fini</th>
                    <th scope="col">Calibre</th>
                    <th scope="col">Coloration</th>
                    <th scope="col">Variété</th>
                    <th scope="col">Observation</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colisage as $c)

                    <tr>
                        <th scope="row">
                            @isset($c->palette_id)
                                {{$c->palette_id}}
                            @else NA @endisset
                        </th>
                        <td>{{$c->versement}}        </td>
                        <td>{{$c->nbrcolis}}         </td>
                        <td>{{$c->produitfini->name}}</td>
                        <td>{{$c->calibre->name}}    </td>
                        <td>{{$c->coloration->name}} </td>
                        <td>{{$c->variete->name}}    </td>
                        <td>{{$c->observation}}      </td>
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-success" href="{{route('pre_add'    ,$c->id)}}"     >Ajouter </a>
                                <a class="btn btn-info"    href="{{route('colisage.show',   $c->id)}}"     >Afficher</a>
                                <a class="btn btn-warning" href="{{route('colisage.edit',   $c->id)}}"     >Editer  </a>

                                <form action="{{route('colisage.destroy',$c->id)}}" method="post">
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
                {!! $colisage->links() !!}
            </div>
        </div>
    </div>


@endsection


