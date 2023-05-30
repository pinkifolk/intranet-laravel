@extends('layout.layout')
@section('content')
<div class="container mt-12 bg-zinc-500">
    <h1>equipo</h1>
    @foreach ($team_get as $item)
    <li>{{$item->name}}</li>
    <li>{{$item->last_name}}</li>
    <li>{{$item->job_title}}</li>
    @endforeach
</div>
@endsection