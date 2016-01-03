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
    @if(Session::has('flash_message'))

        <div class="alert alert-success {{ Session::has('flash_message_important')? 'alert-important' :'' }}">
            @if(Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ session('flash_message') }}
        </div>

    @endif
    @yield('content')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('div.alert').not('.flash_message_important').delay(3000).slideUp(300);
</script>

@yield('footer')
</body>

</html>