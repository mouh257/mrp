@extends('layouts.app')
@section('title')
    -> Editer une ferme
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une ferme:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('ferme.index') }}"> Liste des fermes</a>
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

        <form action="{{route('ferme.update',$ferme->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" value="{{$ferme->name}}">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" value="{{$ferme->adresse}}">
            </div>

            <div class="mb-3">
                <label for="producteur_id" class="form-label">Producteur</label>
                <select class="form-control" name="producteur_id">
                    @foreach($producteurs as $p)
                        <option value="{{$p->id}}"
                            {{ ( $p==$ferme->producteur) ? 'selected' : '' }}
                        > {{ $p->name }} </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
