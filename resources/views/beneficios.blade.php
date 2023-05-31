@extends('layout.layout')
@section('content')
<h1>Beneficios</h1>
@foreach ($benefit_get as $item)
<div class="grid grid-cols-3 mb-6">
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
@endsection