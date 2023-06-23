<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Provaltec') }}</title>
    @livewireStyles

    <!-- css -->
    @vite('resources/css/app.scss')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body class="bg-back">
    <aside class="fixed top-0 left-0 z-40 w-52 h-screen bg-aside">
        <div class="mx-auto mt-8 p-2 w-200">
            <a href="{{route('home')}}"><img src="{{asset('img/provaltec-blanco.png')}}" alt="Provaltec-SpA"
                    title="Provaltec-SpA"></a>
        </div>
        <nav class="flex flex-col">
            <ul class="text-white">
                <li class="my-3">
                    <i class="fa-solid fa-house mx-2"></i>
                    <a href="#">
                        Inicio
                    </a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-users mx-2"></i>
                    <a href="{{route('personal.index')}}">Personas</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-book mx-2"></i>
                    <a href="{{route('procedures.index')}}">Procedimiento</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-hand-holding-medical mx-2"></i>
                    <a href="{{route('benefits.index')}}">Beneficios</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-gavel mx-2"></i>
                    <a href="{{route('normative.index')}}">Normativas</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-hands-holding-circle mx-2"></i>
                    <a href="{{route('values.index')}}">Valores</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-building mx-2"></i>
                    <a href="{{route('department.index')}}">Departamentos</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-newspaper mx-2"></i>
                    <a href="{{route('personal.index')}}">Noticias</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-bullhorn mx-2"></i>
                    <a href="#">Comunicados</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-user-shield mx-2"></i>
                    <a href="#">Administradores</a>
                </li>
            </ul>
        </nav>
    </aside>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                cc
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    vds
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="p-10 sm:ml-52">
            @yield('content')
        </main>
    </div>

</body>
<!-- Script -->
@livewireScripts
@vite('resources/js/app.js')


</html>