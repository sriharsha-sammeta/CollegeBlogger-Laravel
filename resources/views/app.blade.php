<!Doctype html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Document</title>

        <link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">

    </head>

    <body>

        <div class="container">
            @include('flash::message')

            @yield('content')
        </div>

        <script src="{{ elixir('js/all.js') }}"></script>

        <script>
            $('div.alert').not('.alert_important').delay(3000).slideUp(300);

            <!-- This is only necessary if you do Flash::overlay('...') -->
            $('#flash-overlay-modal').modal();
        </script>

        @yield('footer')
    </body>

</html>