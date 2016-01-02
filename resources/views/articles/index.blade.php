@extends('app')

@section('content')

    <h1>Articles</h1>
    <hr/>
    <a href={{ route('articles.create') }}>Create Article</a>
    @foreach($articles as $article)

        <article>
            <h2><a href="{{ route('articles.show',['articles'=>$article->id] ) }}"> {{ $article->title }} </a></h2>

            <div class="body">
                {{ $article->body }}
            </div>

        </article>

    @endforeach

@stop