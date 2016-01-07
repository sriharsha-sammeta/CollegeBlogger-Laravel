@extends('app')

@section('content')

    <h1> {{ $article->title }} </h1>
    <time>
        {{ $article->real_published_at->diffForHumans() }}
    </time>
    <article>
        {{ $article->body }}
    </article>

    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>

        <ul>
            @foreach($article->tags as $tag)
                <li>{!! link_to_action('TagsController@show', $tag->name, [$tag->name]) !!}</li>
            @endforeach
        </ul>
    @endunless

    <p><a href="{{ route('articles.edit',['articles'=>$article->id]) }}">Edit</a></p>
@stop