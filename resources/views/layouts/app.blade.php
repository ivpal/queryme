<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @yield('content')
    <script>
        window.Queryme = {};

        @if(isset($token))
          window.Queryme.token = @json($token);
        @endif

        @if(isset($user))
            window.Queryme.user = @json($user);
        @endif
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
