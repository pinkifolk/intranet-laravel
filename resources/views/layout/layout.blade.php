<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.scss')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
</head>

<body class="bg-back">
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-aside">
        <div class="flex justify-between flex-col h-screen">
            <div class="flex flex-col items-center mt-24 text-slate-100 m-auto text-center">
                <img src="{{asset(auth()->user()->route_img)}}" class="rounded-full w-32 border-4 border-secondary"
                    alt="{{auth()->user()->img_alt}}" title="{{auth()->user()->title_alt}}">
                <h1 class="font-bold text-2xl">{{auth()->user()->name ." ".auth()->user()->last_name }}</h1>
                <span>{{auth()->user()->job_title}}</span>
            </div>
            <div class="flex flex-col text-slate-100 m-10 text-center">
                <span>
                    @if (auth()->user()->extension)
                    <i class="fa-solid fa-phone"></i>
                    {{auth()->user()->extension}}
                    @else

                    @endif
                </span>
                <span>
                    @if(auth()->user()->birthday)
                    <i class="fa-solid fa-cake-candles mr-1"></i>
                    {{date('d-m-Y',strtotime(auth()->user()->birthday))}}
                    @else

                    @endif
                </span>
                <span>
                    @if (auth()->user()->personal_contact)
                    <i class="fa-solid fa-truck-medical mr-1"></i>
                    {{auth()->user()->personal_contact}}
                    @else

                    @endif

                </span>
                <span>
                    @if (auth()->user()->email)
                    <i class="fa-regular fa-envelope"></i>
                    {{auth()->user()->email}}
                    @else

                    @endif
                </span>
            </div>
        </div>
    </aside>
    <nav class="fixed top-0 mb-5 p-4 sm:ml-64 flex w-screen bg-back z-40">
        <div class="mt-0 mr-5 w-200">
            <a href="{{route('home')}}"><img src="{{asset('img/provaltec-negro.png')}}" alt="Provaltec-SpA"
                    title="Provaltec SpA"></a>
        </div>
        <ul class="flex justify-col mt-2">
            <li>
                <a href="{{route('home')}}"
                    class="font-medium block py-2 pl-7 pr-7 hover:border-b-4 border-b-action">Inicio</a>
            </li>
            <li>
                <a href="{{route('profile')}}"
                    class="font-medium block py-2 pl-7 pr-7 hover:border-b-4 border-b-action">Perfil</a>
            </li>
            <li> <a href="#" class="font-medium block py-2 pl-7 pr-7 peer">Nosotros</a>
                <ul
                    class="absolute drop-shadow-lg hidden peer-hover:flex hover:flex flex-col bg-action p-1 text-white rounded-md">
                    <li><a href="{{route('procedure')}}"
                            class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Procedimientos</a>
                    </li>
                    <li><a href="{{route('benefit')}}"
                            class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Beneficios</a>
                    </li>
                    <li><a href="{{route('normative')}}"
                            class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Normativas</a>
                    </li>
                    <li><a href="{{route('our-values')}}"
                            class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Nuestros
                            Valores</a></li>
                    <li><a href="{{route('teams')}}"
                            class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Equipo</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{route('post')}}"
                    class="font-medium block py-2 pl-7 pr-7 hover:border-b-4 border-b-action">Noticias</a>
            </li>
        </ul>
        <div class="text-black relative right-1">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>
                    <i class=" fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </nav>
    <section class="p-4 sm:ml-64 mt-20">
        @yield('content')
    </section>
    <footer class="p-4 sm:ml-64 bg-black">
        <div class="grid grid-rows-1 gap-5 text-white">
            <div class="m-5">
                <img class="p-3 w-80" src="{{asset('img/provaltec-blanco-footer.png')}}" alt="provaltec-spa"
                    title="Provaltec Spa">
                <div class="pl-6 pt-2">
                    <a href="https://www.youtube.com/channel/UCW-YyJqRU3w_gu7Oo_4KrXA" target="_blank" class="px-2"
                        title="Síguenos en Youtube">
                        <i class="fa-brands fa-youtube fa-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/provaltec/" target="_blank" class="px-2"
                        title="Síguenos en Instagram">
                        <i class="fa-brands fa-instagram fa-xl"></i>
                    </a>
                    <a href="https://www.facebook.com/valvulastecnicas/" target="_blank" class="px-2"
                        title="Síguenos en Facebook">
                        <i class="fa-brands fa-facebook fa-xl"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/provaltec/" target="_blank" class="px-2"
                        title="Síguenos en Linkedin">
                        <i class="fa-brands fa-linkedin fa-xl"></i>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <p>Todos los derechos reservados {{date('Y')}}</p>
            </div>
        </div>
    </footer>

</body>

</html>