@extends('layout.layout')
@section('content')
<div class="mt-12 bg-zinc-500 flex flex-col">
    <img class="w-max" src="storage/Partido.jpeg" alt="">
    <div class="flex flex-col justify-start p-6"></div>
    @foreach ($news_get as $item)
    <li>{{$item->title}}</li>
    <li>{{$item->description}}</li>
    @endforeach
</div>
@endsection