@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un article</div>

                    <div class="panel-body">
                        @foreach($list as $article)
                            <h2>
                                <a href="{{ route('article.show', $article->id) }}">
                                {{ $article->title }}</a>
                            </h2>
                            <p>{{ $article->content  }}</p>
                        @endforeach
   {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection