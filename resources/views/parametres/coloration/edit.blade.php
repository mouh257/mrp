@extends('layouts.app')
@section('title')
    -> Editer une coloration
@endsection

@section('content')
    <div class="container p-5">
        <br>
        <div class="row">
            <div class="col-8">
                <h2>Editer une coloration:</h2>
            </div>
            <div class="col">
                <a class="btn btn-secondary  "
                   href="{{ route('coloration.index') }}"
                > Liste des colorations</a>
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

        <form action="{{route('coloration.update',$coloration->id)}}"
              method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name"
                       value="{{$coloration->name}}">
            </div>

            <div class="mb-3">
                <label for="culture_id" class="form-label">Culture</label>
                <select class="form-control" name="culture_id">
                    @foreach($cultures as $c)
                        <option value="{{$c->id}}"
                            {{ ( $c==$coloration->culture) ? 'selected' : '' }}
                        > {{ $c->name }} </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>

    </div>
@endsection
