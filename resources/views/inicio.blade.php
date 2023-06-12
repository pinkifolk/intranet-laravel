@extends('layout.layout')
@section('content')
<div class="grid grid-cols-1 gap-8">
    <a href="#">
        <div class="lg:flex border-b-4 p-2">
            <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/1686339667706.jpg" alt="">
            <div class="flex flex-col justify-between">
                <div class="flex flex-col justify-start">
                    <h5 class="p-2 text-xl font-bold font-title">Pin Pon</h5>
                    <p class="text-base font-base p-2">En Provaltec SPA, nos complace enormemente presentar a los
                        ganadores
                        del Torneo de Ping Pong 2023. Queremos expresar
                        nuestro agradecimiento a todos nuestros colaboradores por su entusiasmo y destacada
                        participación en
                        esta divertida
                        iniciativa.
                        Este torneo no solo ha sido una competencia deportiva, sino también una oportunidad para
                        fortalecer
                        los lazos y fomentar
                        la camaradería entre nuestro talentoso equipo de personas. Estamos orgullosos de contar con un
                        equipo tan comprometido y
                        talentoso.
                        A medida que avanzamos, esperamos seguir creciendo juntos, promoviendo un ambiente de trabajo
                        dinámico y colaborativo.
                        Felicitaciones nuevamente a los ganadores y a todos los participantes por hacer de este torneo
                        un
                        éxito memorable.
                        ¡Sigamos adelante construyendo éxitos juntos!
                    </p>
                </div>
            </div>
        </div>
    </a>
    <a href="#">
        <div class="lg:flex">
            <div class="flex flex-col justify-between">
                <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/IMG_3839.jpg" alt="">
                <div class="flex flex-col justify-start">
                    <h5 class="p-2 text-xl font-bold">Charla de Beneficios</h5>
                    <p class="text-base p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore aperiam
                        vitae, quaerat quae quia impedit, rem reiciendis, ex cupiditate ullam temporibus distinctio.
                        Dolorem autem eum corrupti, rem dolores nam. Quasi?
                    </p>
                </div>
            </div>
        </div>
    </a>

    <div class="lg:flex">
        <div class="grid grid-cols-4 gap-5">
            <a href="#" class="hover:bg-slate-200">
                <div class="">
                    <img class="w-full object-cover h-80 rounded-lg lg:w-84 " src="storage/Partido.jpeg" alt="">
                    <h5 class="p-2 text-xl font-bold">Caja Los Heroes</h5>
                    <p class="text-base p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dignissimos
                        aliquam,
                        perspiciatis fugiat
                    </p>
                </div>
            </a>
            <div class="">
                <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt="">
            </div>
            <div class="">
                <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt="">
            </div>
            <div class="">
                <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt="">
            </div>
        </div>
        {{-- <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt=""> --}}
        {{-- <div class="flex flex-col justify-between">
            <div class="flex flex-col justify-start">
                <h5 class="p-2 text-xl font-bold">Caja Los Heroes</h5>
                <p class="text-base p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dignissimos
                    aliquam,
                    perspiciatis fugiat
                    non
                    in ratione aliquid tempore incidunt laborum sunt. Optio pariatur incidunt tenetur quam et, ex
                    quo
                    libero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita repellendus voluptas
                    fuga
                    nulla eaque velit nemo voluptates a adipisci tenetur, quibusdam voluptatum facere cupiditate
                    suscipit
                    minima perferendis optio unde quis.
                </p>
            </div>
        </div> --}}
    </div>
    </a>
</div>
{{-- @foreach ($news_get as $item)
<li>{{$item->title}}</li>
<li>{{$item->description}}</li>
@endforeach --}}
@endsection