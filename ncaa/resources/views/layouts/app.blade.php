<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NCAA Tournament Challenge</title>

        <!-- Bootstrap Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Laravel Welcome Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Font-Awesome -->
        <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @include ('layouts.navbar')
            <div class="container">
                @yield ('content')
            </div>
        </div>

        <!-- Bootstrap Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
