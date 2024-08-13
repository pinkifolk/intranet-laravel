@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Procedimientos</h1>

<div class="grid grid-cols-3 gap-3 w-[800px] h-[400px] m-auto">
    @foreach ($get_asign as $item)
        <a href="{{route('procedure.show',$item->orders)}}" class="block max-w-sm p-6 bg-yellow-500 border border-gray-200 rounded-lg shadow transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:duration-100">        
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$item->orders}}</h5>
            <p class="font-normal text-gray-800">Procedimientos de el area de {{$item->orders}}</p>
        </a>
    @endforeach
</div>
<h1 class="h-screen"></h1>
@endsection