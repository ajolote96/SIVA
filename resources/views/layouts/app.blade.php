<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIPSUTERMCFE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.js"></script>


    <script type="text/javascript">
        var baseURL = {!! json_encode(url('/')) !!}
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
                

                    <!-- Right Side Of Navbar -->
 
                    
        <script src="{{ asset('js/agenda.js') }}" defer></script>
        
        <script src="{{ asset('js/agendaEmpleado.js') }}" defer></script>

        <script src="{{ asset('js/agendaCursos.js') }}" defer></script>
        <script src="{{ asset('js/agendaPermisos.js') }}" defer></script>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
