<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.scss')
</head>

<body class="bg-back">
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-aside">

    </aside>
    <nav class="fixed top-0 mb-5 p-4 sm:ml-64 flex justify-between">
        <div class="mt-0 w-200">
            <img src="{{asset('img/provaltec-negro.png')}}" alt="Provaltec-SpA" title="Provaltec-SpA">
        </div>
        <ul class="flex justify-center space-x-5">
            <li>Inicio</li>
            <li>Perfil</li>
            <li>Nosotros
                <ul>
                    <li>Procedimientos</li>
                    <li>Beneficios</li>
                    <li>Normativas</li>
                    <li>Nuestros Valores</li>
                    <li>Equipo</li>
                </ul>
            </li>
            <li>Noticias</li>
        </ul>
        <div>
            salir
        </div>
    </nav>
    <section class="p-4 sm:ml-64 mt-9">
        @yield('content')
    </section>

</body>

</html>