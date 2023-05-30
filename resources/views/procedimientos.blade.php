@extends('layout.layout')
@section('content')
<div class="container mt-12 bg-zinc-500">
    <h1>Procedimientos</h1>
    @foreach ($procedure_get as $item)
    <li>{{$item->title}}</li>
    <li>{{$item->detail}}</li>
    <li>{{$item->url_pdf}}</li>
    @endforeach
</div>
@endsection