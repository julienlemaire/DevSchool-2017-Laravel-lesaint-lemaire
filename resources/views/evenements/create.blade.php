@extends('layouts.app')

@section('content')
       <div class="container">
              <div class="row">
                     <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                   <div class="panel-heading">Publier un événement</div>

                                   <div class="panel-body">
                                          {!! Form::open(['route' => 'evenement.store', 'method' => 'POST']) !!}

                                          {!! Form::label('nom', 'Nom') !!}
                                          {!! Form::text('nom', null,
                                          ['class' => 'form-control', 'placeholder' => 'Titre']) !!}

                                          {!! Form::label('description', 'Description') !!}
                                          {!! Form::textarea('description', null,
                                          ['class' => 'form-control', 'placeholder' => 'Description']) !!}

                                          {!! Form::label('date_debut', 'Date de debut') !!}
                                          {!! Form::text('date_debut', null,
                                          ['class' => 'form-control', 'placeholder' => 'yyyyy.mm.jj  heure.min.sec']) !!}

                                          {!! Form::label('date_fin', 'Date de fin') !!}
                                          {!! Form::text('date_fin', null,
                                          ['class' => 'form-control', 'placeholder' => 'yyyyy.mm.jj  heure.min.sec']) !!}

                                          {!! Form::label('lieu', 'Lieu') !!}
                                          {!! Form::text('lieu', null,
                                          ['class' => 'form-control', 'placeholder' => 'Lieu']) !!}

                                          {!! Form::label('tarif', 'Tarif') !!}
                                          {!! Form::text('tarif', null,
                                          ['class' => 'form-control', 'placeholder' => 'Tarif']) !!}

                                          <br>
                                          {!! Form::submit('Publier', ['class' => 'btn btn-info']) !!}

                                          {!! Form::close() !!}


                                   </div>
                            </div>
                     </div>
              </div>
       </div>
@endsection