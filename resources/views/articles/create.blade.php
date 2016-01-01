@extends('app')

@section('content')
    <h1>Write a new Article</h1>

    <hr/>

    {!! Form::open(['url' => 'articles']) !!}

    <!-- Temporariy fix -->

    {!! Form::hidden('user_id', '1') !!}

    @include('articles.form',['submitButtonText'=>'Add Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop