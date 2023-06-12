<div>
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-aside">
        <div class="flex justify-between flex-col h-screen">
            <div class="flex flex-col items-center mt-24 text-slate-100 m-auto text-center">
                <img src="{{$img}}" class="rounded-full w-32 border-4 border-secondary" alt="" title="">
                <h1 class="font-bold text-2xl">{{$name}}</h1>
                <span>{{$job}}</span>
            </div>
            <div class="flex flex-col text-slate-100 m-10 text-center">
                <span>
                    <i class="fa-solid fa-phone"></i>
                    {{$ext}}
                </span>
                <span>
                    <i class="fa-solid fa-cake-candles mr-1"></i>
                    {{$birthday}}
                </span>
                <span>
                    <i class="fa-regular fa-envelope"></i>
                    {{$email}}
                </span>
            </div>
        </div>
    </aside>
    <nav class="fixed top-0 mb-5 p-4 sm:ml-64 flex w-screen bg-back z-40">
        <div class="mt-0 mr-5 w-200">
            <a href="{{route('home')}}"><img src="{{asset('img/provaltec-negro.png')}}" alt="Provaltec-SpA"
                    title="Provaltec-SpA"></a>
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
        <div class="text-black">
            <button class="">Salir</button>
            <i class=" fa-solid fa-right-from-bracket"></i>
        </div>
    </nav>
    <section class="p-4 sm:ml-64 mt-20">
        @foreach ($team as $item)
        <button wire:click="showInfo({{$item->id}})">{{$item->name}}</button>
        @endforeach
    </section>
</div>