@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $evenement->nom }}</div>

                    <div class="panel-body">
                        {{ $evenement->description }}

                        <br>

                        <em>Auteur : {{ $evenement->user->name }}</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection