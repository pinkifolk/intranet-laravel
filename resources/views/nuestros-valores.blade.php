@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Nuestros Valores</h1>
@foreach ($values_get as $item)
<div class="grid grid-cols-2 md:grid-cols-3 mb-6 p-5 hover:bg-slate-300 rounded-md">
    <div class="col-span-3">
        <h5 class="font-bold text-xl">{{$item->title}}</h5>
    </div>
    <div class="col-span-2">{{$item->detail}}</div>
</div>
@endforeach
<h1 class="h-screen"></h1>
@endsection