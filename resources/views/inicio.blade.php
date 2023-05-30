@extends('layout.layout')
@section('content')
<div class="container mt-12 bg-zinc-500">
    <h1>Inicio</h1>
    @foreach ($news_get as $item)
    <li>{{$item->title}}</li>
    <li>{{$item->description}}</li>
    @endforeach
</div>
@endsection