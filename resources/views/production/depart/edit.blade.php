@extends('layouts.app')
@section('title')
    -> Editer un depart
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer un depart:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('depart.index') }}"> Liste des departs</a>
            </div>

        </div>

        <br>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $er)
                        <li>{{ $er }} </li>
                    @endforeach
                </ul>
            </div>
            <br>
        @endif

        <form action="{{route('depart.update',$depart->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>N° Exp
                    <input type="text" class="form-control" name="numexp" value="{{$depart->numexp}}">
                </label>
            </div>
            <div class="mb-3">
                <label>Date depart
                    <input type="date" class="form-control" name="datedepart" value="{{$depart->datedepart}}">
                </label>
            </div>
            <div class="mb-3">
                <label>N° Immat. Tracteur
                    <input type="text" class="form-control" name="tracteur" value="{{$depart->tracteur}}">
                </label>
            </div>
            <div class="mb-3">
                <label>N° Immat. Remorque
                    <input type="text" class="form-control" name="remorque" value="{{$depart->remorque}}">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
