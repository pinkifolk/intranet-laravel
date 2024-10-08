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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-back">
    <aside class="fixed top-0 left-0 z-40 w-52 h-screen bg-aside">
        <div class="mx-auto mt-6 p-2 w-200">
            <a href="{{route('admin.home')}}"><img src="{{asset('img/provaltec-blanco.png')}}" alt="Provaltec-SpA"
                    title="Provaltec-SpA"></a>
        </div>
        <nav class="flex flex-col">
            <ul class="text-white">
                <li class="py-1 hover:bg-hover">
                    <i class="fa-solid fa-house mx-2"></i>
                    <a href="{{route('admin.home')}}">
                        Inicio
                    </a>
                </li> 
            </ul>     
            <button type="button" class="flex items-center justify-between text-white py-1 hover:bg-hover w-full" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span class=""><i class="fa-solid fa-users mx-2"></i> Equipo</span>
                
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>                       
            </button>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">  
                <ul class="text-white">                 
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-users ml-5"></i>
                        <a href="{{route('personal.index')}}">Colaboradores</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-calendar-days ml-5"></i>                    
                        <a href="{{route('cronogram.index')}}">Cronograma</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-timeline ml-5"></i>                   
                        <a href="{{route('history.index')}}">Historial</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-building ml-5"></i>
                        <a href="{{route('department.index')}}">Departamentos</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-regular fa-image ml-5"></i>
                        <a href="{{route('gallery.admin')}}">Galeria</a>
                    </li>
                </ul>
              </div> 
            <button type="button" class="flex items-center justify-between text-white py-1 hover:bg-hover w-full" data-accordion-target="#accordion-collapse-body-2" aria-expanded="true" aria-controls="accordion-collapse-body-2">
                <span class=""><i class="fa-solid fa-book mx-2"></i> Documentación</span>
                
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>                       
            </button>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">  
                <ul class="text-white">                 
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-book ml-5"></i>
                        <a href="{{route('procedures.index')}}">Procedimiento</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-hand-holding-medical ml-5"></i>
                        <a href="{{route('benefits.index')}}">Beneficios</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-gavel ml-5"></i>
                        <a href="{{route('normative.index')}}">Normativas</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-hands-holding-circle ml-5"></i>
                        <a href="{{route('values.index')}}">Valores</a>
                    </li>
                </ul>
              </div>
            <button type="button" class="flex items-center justify-between text-white py-1 hover:bg-hover w-full" data-accordion-target="#accordion-collapse-body-3" aria-expanded="true" aria-controls="accordion-collapse-body-3">
                <span class=""><i class="fa-solid fa-bullhorn mx-2"></i> Comunicación</span>
                
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>                       
            </button>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">  
                <ul class="text-white">                 
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-newspaper ml-5"></i>
                        <a href="{{route('news.index')}}">Noticias</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-bullhorn ml-5"></i>
                        <a href="{{route('releases.release')}}">Comunicados</a>
                    </li>

                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-rss ml-5"></i>
                        <a href="{{route('admin-rrss')}}">RRSS</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-comment ml-5"></i>
                        <a href="{{route('admin-question')}}">Preguntas</a>
                    </li>
                    <li class="my-3 py-1 hover:bg-hover">
                        <i class="fa-solid fa-clock ml-5"></i>
                        <a href="{{route('admin-campaign')}}">Campañas</a>
                    </li>
                </ul>
              </div>        
              <ul class="text-white">                                          
                <li class="my-1 py-1 hover:bg-hover">
                    <i class="fa-solid fa-user-shield mx-2"></i>
                    <a href="{{route('adminstrators.index')}}">Administradores</a>
                </li>
                <li class="my-1 py-1 hover:bg-hover">
                    <i class="fa-solid fa-arrow-left mx-2"></i>
                    <a href="{{route('home')}}">Volver al Portal</a>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const accordionButtons = document.querySelectorAll('[data-accordion-target]');
  
      accordionButtons.forEach(button => {
          button.addEventListener('click', function () {
              const target = document.querySelector(this.getAttribute('data-accordion-target'));
  
              // Toggle hidden class
              if (target.classList.contains('hidden')) {
                  target.classList.remove('hidden');                                                                                             
                  this.setAttribute('aria-expanded', 'true');
              } else {
                  target.classList.add('hidden');
                  this.setAttribute('aria-expanded', 'false');
              }
          });
      });
  });
  </script>
@livewireScripts
@vite('resources/js/app.js')


</html>