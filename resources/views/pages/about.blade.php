@extends('app')

@section('content')
    <h1>About me: </h1>

    @if($first == 'sriharsha')
        <br/>
        I am {{$first}}

        @if(count($people)>0)

            <h3>and the people I like are: </h3>

            <ul>

                @foreach($people as $person)

                    <li>{{$person}}</li>

                @endforeach

            </ul>
cd ..
        @endif

    @else
        Unknown person !
    @endif


@endsection