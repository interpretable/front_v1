<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    {!! MaterializeCSS::include_full() !!}

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- ----------------------------- -->

    @yield('css')
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-wrapper blue">
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="table">Table</a></li>
                    <li><a href="scenarios">Scénarios</a></li>
                    <li><a href="#">Mise à jour</a></li>
                </ul>
                <a href="{{ url('/') }}" class="brand-logo"></a>
            </div>
        </nav>
        @yield('content')
        
    </div>
    
</body>
</html>