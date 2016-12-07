

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un événement</div>

                    <div class="panel-body">
                        @foreach($list as $evenement)
                            <h2>
                                <a href="{{ route('evenement.show', $evenement->id) }}">
                                    {{ $evenement->nom }}</a>
                            </h2>
                            <p>{{ $evenement->description }}</p>
                            <p>{{ 'Date de debut : ' }} {{ $evenement->date_debut }}</p>
                            <p>{{ 'Date de fin : ' }} {{ $evenement->date_fin }}</p>
                            <p>{{ 'Lieu : ' }} <em>{{ $evenement->lieu }}</em></p>
                            <p>{{ 'Prix : ' }} <strong>{{ $evenement->tarif }}</strong></p>
                            <hr style="border-color: lightsteelblue">
                        @endforeach
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection