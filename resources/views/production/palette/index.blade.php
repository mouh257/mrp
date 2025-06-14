@extends('layouts.app')
@section('title')
    -> Liste des palettes
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-9">
                <h2>Liste des palettes:</h2>
            </div>
            <div class="col">
                <a class="btn btn-primary"
                   href="{{ route('palette.create') }}"
                > Nouvelle palette</a>
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
                    <th scope="col">N° serie</th>
                    <th scope="col">N° Expedition</th>
                    <th scope="col">N° commande</th>
                    <th scope="col">N° palette</th>
                    <th scope="col">Type Palette</th>
                    <th scope="col">Actions :</th>
                </tr>
                </thead>
                <tbody>
                @foreach($palettes as $p)

                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td>
                            @isset($p->depart)
                                {{$p->depart->numexp}}
                            @else NA @endisset
                        </td>
                        <td>{{$p->numcmd}}</td>
                        <td>{{$p->numpal}}</td>
                        <td>@isset($p->typePalette)
                                {{$p->typePalette->name}}
                            @else - @endisset
                        </td>
                        <td style="width: 300px">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-info" href="{{route('palette.show',$p->id)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('palette.edit',$p->id)}}">Editer</a>

                                <form action="{{route('palette.destroy',$p->id)}}" method="post">
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
                {!! $palettes->links() !!}
            </div>
        </div>
    </div>


@endsection


