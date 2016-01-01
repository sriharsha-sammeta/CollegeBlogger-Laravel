@extends('app')

@section('content')

    <h1> {{ $article->title }} </h1>
    <time>
        {{ $article->published_at->diffForHumans() }}
    </time>
    <article>
        {{ $article->body }}
    </article>
    
    <p><a href="{{ route('articles.edit',['articles'=>$article->id]) }}">Edit</a></p>
@stop