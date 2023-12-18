@extends('layout.layout')
@section('content')
@foreach ($result as $item)
<h1 class="text-3xl italic text-center">{{$item->title}}</h1>
<div class="italic text-md text-justify p-3">
    <span>{{$item->descripcion}}</span>
</div>
<a href="{{route('gallery.show',$item->slug)}}" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12 mt-2">
    @foreach ($item->photos->take(4) as $i)
    <div>
        <img class="h-auto max-w-full rounded-lg" src="{{$i->url_img}}" alt="">
    </div>
    @endforeach
</a>
@endforeach
<h1 class="h-screen"></h1>
@endsection