@extends('layout.layout')
@section('content')
<div class="grid grid-cols-1 gap-8">
    @foreach ($news_five_first as $key=> $item)
    @if ($key > 3)
    <a href="{{route('post.show',$item->slug)}}" class="hover:bg-slate-300">
        <div class=" lg:flex p-5">
            <div class="flex flex-col justify-between">
                <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="{{$item->imagen}}" alt="">
                <div class="flex flex-col justify-start">
                    <h5 class="p-2 text-xl font-bold">{{$item->title}}</h5>
                    <div class="text-base p-2">
                        {!!$item->description!!}
                    </div>
                </div>
            </div>
        </div>
    </a>
    @else
    <a href="{{route('post.show',$item->slug)}}" class="hover:bg-slate-300">
        <div class=" lg:flex p-5">
            <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="{{$item->imagen}}" alt="">
            <div class="flex flex-col justify-between">
                <div class="flex flex-col justify-start mx-2">
                    <h5 class="p-2 text-xl font-bold font-title">{{$item->title}}</h5>
                    <div class="mx-2">
                        {!!$item->description!!}
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endif

    @endforeach
    <div class="lg:flex p-5">
        <div class="grid grid-cols-4 gap-5 p-5">
            @foreach ($news_four_first as $item)
            <a href="{{route('post.show',$item->slug)}}" class="hover:bg-slate-300">
                <div class="">
                    <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="{{$item->imagen}}" alt="">
                    <h5 class="p-2 text-xl font-bold">{{$item->title}} </h5>
                    <span class="text-xs text-slate-600 p-2">
                        Pubicado:
                        <i class="fa-regular fa-clock fa-sm"></i>
                        {{date('d-m-Y',strtotime($item->created_at))}}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    </a>
</div>
@endsection