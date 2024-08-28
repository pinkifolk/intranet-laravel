@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Campañas del mes</h1>

@foreach ($get_campaign as $item)
    @if (date('m',strtotime($item->valid_to)) <= date('m',strtotime($fecha)))
    <div class="lg:flex justify-center">
        <div class="flex flex-col justify-between p-4 md:p-9">
            <img class="rounded-lg md:max-w-screen-md m-auto" src="{{$item->url_image}}" alt=""
                title="{{$item->url_image}}">
            <h1 class="text-3xl font-bold my-5 ">{{$item->title}}</h1>
            <div class="text-justify mx-2">
                {{$item->detail}}
            </div>
            <span class="text-sm text-slate-600 mx-2 my-3">
                Vigencia:
                <i class="fa-regular fa-clock fa-sm"></i>
                {{date('d-m-Y',strtotime($item->valid_to))}}
            </span>
        </div>
    </div>
    @else
    <p>No hay campañas para este mes</p>
    @endif
@endforeach

<h1 class="h-screen"></h1>
@endsection