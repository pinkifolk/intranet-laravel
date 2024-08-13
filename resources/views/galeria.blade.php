@extends('layout.layout')
@section('content')
<div class="flex justify-center w-full gap-2 flex-wrap ">
    @foreach ($result as $item)    
        <div class="bg-white rounded-lg shadow-sm shadow-aside  max-w-sm">
            <a href="{{route('gallery.show',$item->slug)}}">
                @foreach ($item->photos->take(1) as $img)
                    <img class="rounded-t-lg" src="{{$img->url_img}}" alt="{{$item->title}}" />
                @endforeach
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$item->title}}</h5>
                </a>   
                <p class="pb-2 text-gray-800">{!!Str::limit($item->descripcion,100)!!}</p>         
                <a href="{{route('gallery.show',$item->slug)}}" class="block items-center px-3 py-2 text-sm font-medium text-center text-white hover:text-aside bg-action rounded-lg">
                    Ver galeria
                </a>
            </div>
        </div>
    @endforeach
</div>
{{-- <div class="grid sm:grid-cols-12 lg:grid-cols-3 gap-2">
@foreach ($result as $item)    
<div class="max-w-sm bg-white border border-aside/60 rounded-lg shadow-sm shadow-aside">
    <a href="{{route('gallery.show',$item->slug)}}">
        @foreach ($item->photos->take(1) as $img)
            <img class="rounded-t-lg" src="{{$img->url_img}}" alt="{{$item->title}}" />
        @endforeach
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$item->title}}</h5>
        </a>   
        <p class="pb-2 text-gray-800">{!!Str::limit($item->descripcion,100)!!}</p>         
        <a href="{{route('gallery.show',$item->slug)}}" class="block items-center px-3 py-2 text-sm font-medium text-center text-white hover:text-aside bg-action rounded-lg">
            Ver galeria
        </a>
    </div>
</div>
@endforeach
</div> --}}
<h1 class="h-screen"></h1>
@endsection
