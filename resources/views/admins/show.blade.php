
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $article->title }}</div>

                    <div class="panel-body">
                        {{ $article->content }}

                        <br>
                        <br>
                        <em>Auteur : {{ $article->user->name }}</em>
                        <br>
                        <br>

                        @if(Auth::check() && Auth::user()->isAdmin)
                            <a href="{{ route('admin.edit', $article->id) }}" class="btn btn-warning">Modifier</a>

                            <br>

                            {!! Form::model($article, [
                            'route' => ['admin.destroy', $article->id],
                            'method' => 'DELETE'
                            ]) !!}
                            {!! Form::model($article,
                             array(
                            'route' =>array('admin.destroy', $article->id),
                            'method' => 'DELETE'
                            )) !!}

                            <br>

                            {!! Form::submit('Supprimer', ['class' =>'btn btn-danger']) !!}

                            {!! Form::close() !!}

                            <br>

                            <a href="{{ route('admin.index') }}">Retour aux articles</a>

                            {!! Form::close() !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection