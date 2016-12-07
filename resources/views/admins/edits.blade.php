@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier un evenement</div>

                    <div class="panel-body">
                        {{--Formulaire de modification--}}

                        {!! Form::model($evenement, ['route' => ['admin.updates', $evenement->id],
                        'method' => 'PUT']) !!}

                        {!! Form::label('nom', 'Titre') !!}
                        {!! Form::text('nom', null,
                        ['class' => 'form-control', 'placeholder' => 'Titre']) !!}

                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null,
                        ['class' => 'form-control', 'placeholder' => 'Description']) !!}

                        {!! Form::label('date_debut', 'Date de debut') !!}
                        {!! Form::text('date_debut', null,
                        ['class' => 'form-control', 'placeholder' => 'y.m.d  heure.min.sec']) !!}

                        {!! Form::label('date_fin', 'Date de fin') !!}
                        {!! Form::text('date_fin', null,
                        ['class' => 'form-control', 'placeholder' => 'y.m.d  heure.min.sec']) !!}

                        {!! Form::label('lieu', 'Lieu') !!}
                        {!! Form::text('lieu', null,
                        ['class' => 'form-control', 'placeholder' => 'Lieu']) !!}

                        {!! Form::label('tarif', 'Tarif') !!}
                        {!! Form::text('tarif', null,
                        ['class' => 'form-control', 'placeholder' => 'Tarif']) !!}

                        <br>
                        {!! Form::submit('Mettre à jour', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection