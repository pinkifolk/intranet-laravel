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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    @vite('resources/css/app.scss')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body class="bg-back">
    <aside class="fixed top-0 left-0 z-40 w-52 h-screen bg-aside">
        <div class="mx-auto mt-8 p-2 w-200">
            <a href="{{route('admin.home')}}"><img src="{{asset('img/provaltec-blanco.png')}}" alt="Provaltec-SpA"
                    title="Provaltec-SpA"></a>
        </div>
        <nav class="flex flex-col">
            <ul class="text-white">
                <li class="my-3">
                    <i class="fa-solid fa-house mx-2"></i>
                    <a href="{{route('admin.home')}}">
                        Inicio
                    </a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-users mx-2"></i>
                    <a href="{{route('personal.index')}}">Colaboradores</a>
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
                    <a href="{{route('news.index')}}">Noticias</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-bullhorn mx-2"></i>
                    <a href="{{route('releases.release')}}">Comunicados</a>
                </li>
                <li class="my-3">
                    <i class="fa-solid fa-user-shield mx-2"></i>
                    <a href="{{route('adminstrators.index')}}">Administradores</a>
                </li>
            </ul>
        </nav>
        <div class="absolute bottom-0 text-white right-0 p-2 border-t-2 border-slate-500 w-full">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>
                    <i class=" fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </aside>
    <main class="p-10 sm:ml-52">
        @yield('content')
    </main>
    </div>

</body>
@yield('js')
<!-- Script -->
@livewireScripts
@vite('resources/js/app.js')


</html>