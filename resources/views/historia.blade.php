<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="favicon.ico" sizes="32x32">
    @vite('resources/css/app.scss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <nav class="fixed top-0 mb-5 p-4 w-screen md:flex bg-back z-40">
        <div class="flex justify-between md:mt-0 md:mr-5">
            <a href="{{route('home')}}"><img class="w-200" src="{{asset('img/provaltec-negro.png')}}"
                    alt="Provaltec-SpA" title="Provaltec SpA"></a>
            <button class="p-5 md:hidden" id="open">
                <i class="fa-solid fa-bars fa-xl"></i>
            </button>
        </div>
        <div class="w-full md:flex md:w-auto hidden " id="navbar">
            <ul class="bg-aside rounded-md w-full text-white mt-2 md:flex md:bg-back md:text-black">
                <li>
                    <a href="{{route('home')}}"
                        class="font-medium block py-2 pl-7 pr-7 md:hover:border-b-4 border-b-action">Inicio</a>
                </li>
                <li>
                    <a href="{{route('cronogram')}}" class="font-medium block py-2 pl-7 pr-7 hover:text-aside peer">Cronograma</a>
                </li>
                <li> <a href="#" id="openSub" class="font-medium block py-2 pl-7 pr-7 peer">Nosotros <div
                            class="md:hidden float-right"><i class="fa-solid fa-chevron-down"></i>
                        </div></a>
                    <ul class="w-full md:w-auto md:absolute drop-shadow-lg hidden md:peer-hover:flex md:hover:flex flex-col bg-action p-1 text-white rounded-md"
                        id="sub">
                        <li><a href="{{route('procedure')}}"
                                class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Procedimientos</a>
                        </li>
                        <li><a href="{{route('benefit')}}"
                                class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Beneficios</a>
                        </li>
                        <li><a href="{{route('normative')}}"
                                class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Politicas / Reglamentos</a>
                        </li>
                        <li><a href="{{route('our-values')}}"
                                class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Nuestros
                                Valores</a></li>
                        <li>
                            <a href="#"
                                class="font-medium block py-2 pl-7 pr-7 hover:text-aside peer">Areas</a>
                            <ul
                                class="hidden md:peer-hover:flex bg-action absolute top-40 left-[232px] md:hover:flex flex-col rounded-md w-64">
                                <li>
                                    @foreach ($dep as $item)
                                    <a href="{{route('department',$item)}}"
                                        class="font-medium block py-2 pl-7 pr-7 hover:text-aside">{{$item->name}}</a>
                                    @endforeach

                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('history')}}" class="font-medium block py-2 pl-7 pr-7 md:hover:border-b-4 border-b-action">Historia</a>
                </li>
                <li>
                    <a href="{{route('gallery')}}" class="font-medium block py-2 pl-7 pr-7 md:hover:border-b-4 border-b-action">Galeria</a>
                </li>
                <li><a href="{{route('post')}}"
                        class="font-medium block py-2 pl-7 pr-7 md:hover:border-b-4 border-b-action">Noticias</a>
                </li>
                @if(auth()->user()->is_admin === 1)
                <li><a href="{{route('admin.home')}}"class="font-medium block py-2 pl-7 pr-7 hover:text-aside">Configuración</a></li>
                @else

                @endif
                <li class="md:hidden">
                    <div class="text-white md:text-black font-medium block py-2 pl-7 pr-7 text-right">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button>
                                <i class=" fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <section class="absolute top-[70px]">
    <h1 class="text-3xl font-bold mx-5 my-5">Historia de Provaltec</h1>
    @php
    $n = $get_data->count();

    @endphp 

    <style>
        @foreach ($get_data as $item)
        @if($loop->even % 2 == 0)
            .line-vertical-{{str_replace('#', '', $item->color)}}::after{
                content: "";
                border-left: solid 5px {{$item->color}};
                height: 129px;
                position: absolute;
                top: 175px;
                z-index: -1;
            }
        @else
            .line-vertical-{{str_replace('#', '', $item->color)}}::after{
                content: "";
                border-left: solid 5px {{$item->color}};
                height: 122px;
                position: absolute;
                top: 298px;
                z-index: -1;
            }
        @endif
        @endforeach
    </style>

    <div class="flex ml-14 mr-14">

    @foreach ($get_data as $item)

   

    @if($loop->even % 2 == 0)

         {{-- inicio del timeline --}}
        @if ($loop->first)
            <div class="w-[250px] h-[450px] flex flex-col gap-4">
                <div class="flex justify-center items-center self-center rounded-full w-[100px] h-[100px] text-center line-vertical-{{str_replace('#', '', $item->color)}}" style="border:  5px solid {{$item->color}}">
                    {{date('Y',strtotime($item->date))}}
                </div>
                <div class="h-[25px] rounded-s-xl mt-[100px]" style="background-color: {{$item->color}}"></div>
                <div class="text-center">
                    <h2 class="text-2xl pb-2">{{$item->title}}</h2>
                    <p>{{$item->detail}}</p>
                </div>
            </div>
        @else
        {{-- hacia abajo --}}
            <div class="w-[250px] h-[450px] flex flex-col gap-4">
                <div class="flex justify-center items-center self-center rounded-full w-[100px] h-[100px] text-center line-vertical-{{str_replace('#', '', $item->color)}}" style="border:  5px solid {{$item->color}}">
                    {{date('Y',strtotime($item->date))}}
                </div>
                <div class="h-[25px] mt-[100px]" style="background-color: {{$item->color}}"></div>
                <div class="text-center">
                    <h2 class="text-2xl mt-2">{{$item->title}}</h2>
                    <p>{{$item->detail}}</p>
                </div>
            </div>
            
        @endif
        
    @else

    {{-- final del timeline --}}
    @if ($loop->last)
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h2 class="text-2xl mt-2">Titulo</h2>
            </div>
            <div class="h-[25px] mt-[40px] rounded-e-xl" style="background-color: {{$item->color}}"></div>
            <div class="flex justify-center items-center self-center mt-[85px] rounded-full w-[100px] h-[100px] text-center line-vertical-{{str_replace('#', '', $item->color)}}" style="border:  5px solid {{$item->color}}">
                2010
            </div>
        </div>       
        @else
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="text-center">
                <p>{{$item->detail}}</p>
                <h2 class="text-2xl mt-2">{{$item->title}}</h2>
            </div>
            <div class="h-[25px] mt-[40px]" style="background-color: {{$item->color}}"></div>
            <div class="flex justify-center items-center self-center mt-[85px] rounded-full w-[100px] h-[100px] text-center line-vertical-{{str_replace('#', '', $item->color)}}" style="border:  5px solid {{$item->color}}">
                {{date('Y',strtotime($item->date))}}
            </div>
        </div> 
    @endif
    @endif


   
        
    @endforeach
    </div>
    <!--
    <div class="flex ml-14 mr-14">
        {{-- inicio del timeline --}}
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="flex justify-center items-center self-center border-[5px] border-orange-500 rounded-full w-[100px] h-[100px] text-center line-vertical-f97316">
                2010
            </div>
            <div class="bg-orange-500 h-[25px] rounded-s-xl mt-[100px]"></div>
            <div class="text-center">
                <h2 class="text-2xl pb-2">Titulo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        {{-- hasta aqui --}}
        {{-- hacia abajo --}}
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h2 class="text-2xl mt-2">Titulo</h2>
            </div>
            <div class="bg-yellow-500 h-[25px] mt-[40px]"></div>
            <div class="flex justify-center items-center self-center mt-[85px] border-[5px] border-yellow-500 rounded-full w-[100px] h-[100px] text-center line-vertical-eab308">
                2010
            </div>
        </div>
        {{-- hacia arriba --}}
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="flex justify-center items-center self-center border-[5px] border-blue-600 rounded-full w-[100px] h-[100px] text-center line-vertical-rgb3799235">
                2010
            </div>
            <div class="bg-blue-600 h-[25px] mt-[100px]"></div>
            <div class="text-center">
                <h2 class="text-2xl mt-2">Titulo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h2 class="text-2xl mt-2">Titulo</h2>
            </div>
            <div class="bg-violet-500 h-[25px] mt-[40px]"></div>
            <div class="flex justify-center items-center self-center mt-[85px] border-[5px] border-violet-500 rounded-full w-[100px] h-[100px] text-center line-vertical-rgb13992264">
                2010
            </div>
        </div>
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="flex justify-center items-center self-center border-[5px] border-blue-600 rounded-full w-[100px] h-[100px] text-center line-vertical-rgb3799235">
                2010
            </div>
            <div class="bg-blue-600 h-[25px] mt-[100px]"></div>
            <div class="text-center">
                <h2 class="text-2xl mt-2">Titulo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h2 class="text-2xl mt-2">Titulo</h2>
            </div>
            <div class="bg-violet-500 h-[25px] mt-[40px]"></div>
            <div class="flex justify-center items-center self-center mt-[85px] border-[5px] border-violet-500 rounded-full w-[100px] h-[100px] text-center line-vertical-rgb13992264">
                2010
            </div>
        </div>
        {{-- final del timeline --}}
        <div class="w-[250px] h-[450px] flex flex-col gap-4">
            <div class="flex justify-center items-center self-center border-[5px] border-green-800 rounded-full w-[100px] h-[100px] text-center line-vertical-rgb2210152">
                2010
            </div>
            <div class="bg-green-800 h-[25px] mt-[100px] rounded-e-xl"></div>
            <div class="text-center">
                <h2 class="text-2xl mt-2">Titulo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla odit soluta reprehenderit tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        {{-- hasta aqui --}}
    </div>-->
    </section>

</body>
</html>