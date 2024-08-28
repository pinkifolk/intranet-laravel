@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Publicaciones en RRSS</h1>
<div class="flex flex-col justify-center items-center gap-2">
    
@foreach ($get_rrss as $item)
    <div class="max-w-xl bg-white border border-gray-100 rounded-lg shadow">
        <div class="p-5">    
            <div class="flex">
                <div class="flex-shrink-0">
                    <img  style="width:40px" class="rounded-full" src="{{$item->avatar}}" alt="">
                </div>
                <div class="flex-1 min-w-0 ms-4">
                    <p class="text-md font-bold text-gray-900 truncate ">
                       {{$item->name}}
                    </p>
                    <p class="text-sm text-gray-500 truncate">
                        Creado: {{date('d-m-Y',strtotime($item->created_at))}}
                    </p>
                </div>
            </div>
            <p class="mb-3 font-normal">{{$item->detail}}</p>
            <img class="rounded-t-lg m-auto" src="{{$item->url_img}}" alt="" />
        </div>
    </div>    
@endforeach

<h1 class="h-screen"></h1>
@endsection