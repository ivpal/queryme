<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav-header></nav-header>

        @yield('content')

        <login-modal></login-modal>
    </div>
    <script>
        window.Queryme = {!! json_encode(['csrfToken' => csrf_token()]) !!}
        @if(Auth::check())
            window.Queryme.Auth = {!! json_encode(Auth::user()) !!}
        @endif
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
