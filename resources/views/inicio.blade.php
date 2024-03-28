@extends('layout.layout')
@section('content')
<div class="grid grid-cols-1 gap-8">
    @foreach ($news_five_first as $item)
    <a href="{{route('post.show',$item->slug)}}"
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100">
        <img class="object-cover md:max-w-lg rounded-md" src="{{$item->imagen}}" alt="{{$item->slug}}"
            title="{{$item->title}}">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{$item->title}}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {!!Str::limit($item->description,500)!!}</p>
        </div>
    </a>
    @endforeach
</div>
<div class="lg:flex pt-5 md:p-5">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-1 bg-white border border-gray-200 rounded-lg shadow ">
        @foreach ($news_four_first as $item)
        <a href="{{route('post.show',$item->slug)}}" class="hover:bg-slate-300 hover:rounded-lg p-2">
            <img class="w-full object-cover h-80 rounded-lg lg:w-84" src="{{$item->imagen}}" alt="{{$item->slug}}"
                title="{{$item->title}}">
            <div class="flex flex-col space-y-8">
                <h5 class="p-2 text-xl font-bold">{{$item->title}} </h5>
                <span class="text-xs text-slate-600  p-2">
                    Pubicado:
                    <i class="fa-regular fa-clock fa-sm"></i>
                    {{date('d-m-Y',strtotime($item->created_at))}}
                </span>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection