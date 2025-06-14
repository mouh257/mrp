@extends('layouts.app')
@section('title')
    -> Acceuil
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @auth
                        <div class="alert alert-success" role="alert">
                            You are logged in :)
                            <br>
                            you can use the platform !
                        </div>
                    @else

                        <div class="alert alert-danger" role="alert">
                            You are Not logged in !
                            <br>
                            you can't use the platform !
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
