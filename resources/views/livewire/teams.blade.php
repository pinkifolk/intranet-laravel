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
        <div class="text-black relative right-1">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>
                    <i class=" fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </nav>

    <section class="p-4 sm:ml-64 mt-20 text-black text-center">
        <div class="grid grid-rows-1">
            @foreach ($gent as $item)
            <button wire:click="showInfo({{$item->id}})">
                <div>
                    <div class="my-6 w-30 organigram">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span>{{$item->job_title}}</span>
                    </div>
                </div>
            </button>
            @endforeach
        </div>
        <div class="grid grid-rows-1">
            @foreach ($it as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span>{{$item->job_title}}</span>
                    </div>
                </button>
                <div class="grid grid-cols-4">
                    @foreach ($personalIt as $item)
                    <div class="sub">
                        <button wire:click="showInfo({{$item->id}})">
                            <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                                class="rounded-full w-24 m-auto">
                            <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                            <span>{{$item->job_title}}</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            @endforeach
        </div>
        <div class="grid grid-rows-1 my-10">
            @foreach ($sales as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30 organigram">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span class="">{{$item->job_title}}</span>
                    </div>
                </button>
                <div class="grid grid-cols-4 my-8">
                    @foreach ($personalSales as $item)
                    <div class="sub">
                        <button wire:click="showInfo({{$item->id}})">
                            <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                                class="rounded-full w-24 m-auto">
                            <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                            <span>{{$item->job_title}}</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div class="grid grid-rows-1 my-10">
            @foreach ($mkt as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30 organigram">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span class="">{{$item->job_title}}</span>
                    </div>
                </button>
            </div>
            @endforeach
        </div>
        <div class="grid grid-rows-1 my-10">
            @foreach ($adm as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30 organigram">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span class="">{{$item->job_title}}</span>
                    </div>
                </button>
                <div class="grid grid-cols-6 my-8">
                    @foreach ($personalAdm as $item)
                    <div class="sub">
                        <button wire:click="showInfo({{$item->id}})">
                            <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                                class="rounded-full w-24 m-auto">
                            <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                            <span>{{$item->job_title}}</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            </button>
            @endforeach
        </div>
        <div class="grid grid-rows-1 my-10">
            @foreach ($ope as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30 organigram">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span class="">{{$item->job_title}}</span>
                    </div>
                </button>
            </div>
            </button>
            @endforeach
            <div class="grid grid-cols-5 my-8">
                @foreach ($personalOpe as $item)
                <div class="sub">
                    <button wire:click="showInfo({{$item->id}})">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span>{{$item->job_title}}</span>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        <div class="grid grid-rows-1 my-10">
            @foreach ($salesTerr as $item)
            <div>
                <button wire:click="showInfo({{$item->id}})">
                    <div class="my-6 w-30">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span class="">{{$item->job_title}}</span>
                    </div>
                </button>
            </div>
            </button>
            @endforeach
            <div class="grid grid-cols-2 my-8">
                @foreach ($personalTerr as $item)
                <div class="last">
                    <button wire:click="showInfo({{$item->id}})">
                        <img src="{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}"
                            class="rounded-full w-24 m-auto">
                        <h3 class="font-bold">{{$item->name}} {{$item->last_name}}</h3>
                        <span>{{$item->job_title}}</span>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer class="p-4 sm:ml-64 bg-black">
        <div class="grid grid-rows-1 gap-5 text-white">
            <div class="m-5">
                <img class="p-3 w-80" src="img/provaltec-blanco-footer.png" alt="#">
                <div class="pl-6 pt-2">
                    <a href="https://www.youtube.com/channel/UCW-YyJqRU3w_gu7Oo_4KrXA" target="_blank" class="px-2">
                        <i class="fa-brands fa-youtube fa-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/provaltec/" target="_blank" class="px-2">
                        <i class="fa-brands fa-instagram fa-xl"></i>
                    </a>
                    <a href="https://www.facebook.com/valvulastecnicas/" target="_blank" class="px-2">
                        <i class="fa-brands fa-facebook fa-xl"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/provaltec/" target="_blank" class="px-2">
                        <i class="fa-brands fa-linkedin fa-xl"></i>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <p>Todo los derechos reservados</p>
            </div>
        </div>
    </footer>



</div>