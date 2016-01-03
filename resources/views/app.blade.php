<!Doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">
</head>

<body>

<div class="container">
    @if(\Session::has('flash_message'))

        <div class="alert alert-success">{{ \Session::get('flash_message') }}</div>

    @endif
    @yield('content')
</div>

@yield('footer')
</body>

</html>