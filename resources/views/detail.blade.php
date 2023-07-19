@extends('layout.layout')
@section('content')
<div class="container mt-12">
    <div class="lg:flex">
        <div class="flex flex-col justify-between">
            <img class="rounded-lg" src="{{asset($get_news->imagen)}}" alt="">
            <h1 class="text-3xl font-bold my-5 ">{{$get_news->title}}</h1>
            <div class="text-justify mx-2">
                {!!$get_news->description!!}
            </div>
            <span class="text-xs text-slate-600 mx-2 my-3">
                Pubicado:
                <i class="fa-regular fa-clock fa-sm"></i>
                {{date('d-m-Y',strtotime($get_news->created_at))}}
            </span>
        </div>
    </div>
</div>
@endsection