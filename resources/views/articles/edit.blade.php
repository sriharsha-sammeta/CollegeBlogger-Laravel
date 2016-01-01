@extends('app')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>

    {!! Form::model($article,['route'=>['articles.update',$article->id],'method'=>'PATCH']) !!}

    @include('articles.form',['submitButtonText'=>'Update Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop