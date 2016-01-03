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
    @include('flash::message')

    @yield('content')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('div.alert').not('.alert_important').delay(3000).slideUp(300);
</script>

<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').modal();
</script>

@yield('footer')
</body>

</html>