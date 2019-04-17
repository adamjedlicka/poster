<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.css" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app" class="ui container" style="padding-bottom: 1em">

        <div class="column">
            @include('partials/navbar')

            <main id="content">
                @yield('content')
            </main>
        </div>

        @if(Session::has('message'))
        <div class="ui positive message" style="position: fixed; top: 0.5em; right: 1em;">
            <div class="header">
                {{ Session::get('message')['title'] }}
            </div>
            <p>{{ Session::get('message')['text'] }}</p>
        </div>
        @endif

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.js"></script>
</body>
</html>
