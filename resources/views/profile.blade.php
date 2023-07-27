@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-14">Mis Datos</h1>
<div class="flex justify-between flex-col">
    <div class="flex flex-col items-center text-dar m-auto text-center">
        <img src="{{asset(auth()->user()->route_img)}}" class="rounded-full w-32 border-4 border-secondary"
            alt="{{auth()->user()->img_alt}}" title="{{auth()->user()->title_alt}}">
        <h1 class="font-bold text-2xl">{{auth()->user()->name ." ".auth()->user()->last_name }}</h1>
        <span>{{auth()->user()->job_title}}</span>
    </div>
    <div class="flex flex-col text-dark text-center mt-24">
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
@endsection