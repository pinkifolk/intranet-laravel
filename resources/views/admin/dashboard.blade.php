@extends('layouts.app')

@section('content')
<div class="flex flex-col text-center mt-20">
    <img src="{{asset(auth()->user()->route_img)}}" alt="{{auth()->user()->img_alt}}"
        title="{{auth()->user()->title_alt}}" class="rounded-full w-24 m-auto" style="width:8rem; height:8rem;">
    <h1 class="font-bold text-2xl mt-4">Bienvenido {{auth()->user()->name}}!</h1>
</div>
<div>
    <div class="p-4 rounded-lg">
        <dl class="grid max-w-screen-xl grid-cols-2 gap-2 p-4 mx-auto text-gray-900 ">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">{{$person}}</dt>
                <dd class="text-gray-500 dark:text-gray-400">Colaboradores</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">{{$news}}</dt>
                <dd class="text-gray-500 dark:text-gray-400">Noticias Publicadas</dd>
            </div>
    </div>
</div>
@endsection