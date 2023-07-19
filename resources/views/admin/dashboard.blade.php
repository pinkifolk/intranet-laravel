@extends('layouts.app')

@section('content')
<div class="flex flex-col text-center mt-20">
    <img src="{{asset(auth()->user()->route_img)}}" alt="{{auth()->user()->img_alt}}"
        title="{{auth()->user()->title_alt}}" class="rounded-full w-24 m-auto">
    <h1 class="font-bold text-2xl mt-4">Bienvenido {{auth()->user()->name}}!</h1>
</div>
@endsection