@extends('layout.layout')
@section('content')
@foreach ($values_get as $item)
<div class="grid grid-cols-2 md:grid-cols-3 mb-6 p-5">
    <div class="col-span-1">
        <h1 class="font-bold text-3xl mb-5">{{$item->title}}</h1>
    </div>
    <div class="col-span-3 p-5">{!!$item->detail!!}</div>
</div>
@endforeach
<h1 class="h-screen"></h1>
@endsection