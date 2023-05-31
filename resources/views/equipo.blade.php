@extends('layout.layout')
@section('content')
<h1>equipo</h1>
<div class="grid grid-cols-12 gap-4">
    <div class="col-start-6 bg-slate-400 text-center">
        <div class="flex flex-col">
            <div>Nombre</div>
            <div>Cargo</div>
        </div>
    </div>
    <div class="bg-slate-500 text-center">
        <div class="flex flex-col">
            <div>Nombre</div>
            <div>Cargo</div>
        </div>
    </div>
    <div class="col-start-1 col-end-13 bg-slate-500">
        <div class="grid grid-cols-7">
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
        </div>
    </div>
</div>
{{-- @foreach ($team_get as $item)
<li>{{$item->name}}</li>
<li>{{$item->last_name}}</li>
<li>{{$item->job_title}}</li>
@endforeach --}}

@endsection