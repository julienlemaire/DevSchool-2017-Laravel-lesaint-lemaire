@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $evenement->nom }}</div>

                    <div class="panel-body">
                        <p>{{ $evenement->description }}</p> <br>
                        <p>{{ 'Date de debut : ' }} {{ $evenement->date_debut }}</p>
                        <p>{{ 'Date de fin : ' }} {{ $evenement->date_fin }}</p>
                        <p>{{ 'Lieu : ' }} <em>{{ $evenement->lieu }}</em></p>
                        <p>{{ 'Prix : ' }} <strong>{{ $evenement->tarif }}</strong> {{'€'}}</p>

                        <br>

                        <em>Oragnisateur : {{ $evenement->user->name }}</em>

                        <br>
                        <br>

                        <a href="{{ route('evenement.edit', $evenement->id) }}" class="btn btn-warning">Modifier</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection