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

                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success">Modifier</a>

                        <br>

                        {!! Form::model($article, [
                        'route' => ['article.destroy', $article->id],
                        'method' => 'DELETE'
                        ]) !!}

                        <br>

                        {!! Form::submit('Supprimer', ['class' =>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                        <br>

                        <a href="{{ route('article.index') }}">Retour aux articles</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection