@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Politicas y Reglamentos</h1>
@foreach ($normativa_get as $item)
<div class="grid grid-cols-2 md:grid-cols-3 mb-6 p-5 hover:bg-slate-300 rounded-md">
    <div class="col-span-3">
        <h5 class="font-bold text-xl">{{$item->title}}</h5>
    </div>
    <div class="col-span-2">{{$item->detail}}</div>
    <div class="flex items-center justify-center">
        <a href="{{$item->url_pdf}}" target="_bank" title="descargar">
            <i class="fa-solid fa-file-pdf fa-2xl"></i>
        </a>
    </div>
</div>
@endforeach
<h1 class="h-screen"></h1>
@endsection