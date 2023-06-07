@extends('layout.layout')
@section('content')
<div class="grid grid-cols-1 gap-8">
    <div class="lg:flex">
        <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt="">
        <div class="flex flex-col justify-between">
            <div class="flex flex-col justify-start">
                <h5 class="p-2 text-xl font-bold font-title">Pin Pon</h5>
                <p class="text-base font-base p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
                    dignissimos
                    aliquam,
                    perspiciatis fugiat
                    non
                    in ratione aliquid tempore incidunt laborum sunt. Optio pariatur incidunt tenetur quam et, ex quo
                    libero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita repellendus voluptas fuga
                    nulla eaque velit nemo voluptates a adipisci tenetur, quibusdam voluptatum facere cupiditate
                    suscipit
                    minima perferendis optio unde quis.
                </p>
            </div>
            <button class="flex justify-end">Ir</button>
        </div>
    </div>
    <div class="lg:flex">
        {{-- <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt=""> --}}
        <div class="flex flex-col justify-between">
            <div class="flex flex-col justify-start">
                <h5 class="p-2 text-xl font-bold">Caja Los Heroes</h5>
                <p class="text-base p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dignissimos
                    aliquam,
                    perspiciatis fugiat
                    non
                    in ratione aliquid tempore incidunt laborum sunt. Optio pariatur incidunt tenetur quam et, ex quo
                    libero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita repellendus voluptas fuga
                    nulla eaque velit nemo voluptates a adipisci tenetur, quibusdam voluptatum facere cupiditate
                    suscipit
                    minima perferendis optio unde quis.
                </p>
            </div>
            <button class="flex justify-end">Ir</button>
        </div>
    </div>
    <div class="lg:flex">
        {{-- <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="storage/Partido.jpeg" alt=""> --}}
        <div class="flex flex-col justify-between">
            <div class="flex flex-col justify-start">
                <h5 class="p-2 text-xl font-bold">Caja Los Heroes</h5>
                <p class="text-base p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dignissimos
                    aliquam,
                    perspiciatis fugiat
                    non
                    in ratione aliquid tempore incidunt laborum sunt. Optio pariatur incidunt tenetur quam et, ex quo
                    libero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita repellendus voluptas fuga
                    nulla eaque velit nemo voluptates a adipisci tenetur, quibusdam voluptatum facere cupiditate
                    suscipit
                    minima perferendis optio unde quis.
                </p>
            </div>
            <button class="flex justify-end">Ir</button>
        </div>
    </div>
</div>
{{-- @foreach ($news_get as $item)
<li>{{$item->title}}</li>
<li>{{$item->description}}</li>
@endforeach --}}
@endsection