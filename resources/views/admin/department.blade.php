@extends('layouts.app')

@section('content')
<h1>Departamentos</h1>
<form action="{{route('department.store')}}" method="POST">
    @csrf
    <label>Nombre</label>
    <input type="text" name="name">
    <button>Crear</button>
</form>
<div>
    @foreach ($department_get as $item)
    <li>{{$item->id}}</li>
    <li>{{$item->name}}</li>
    @endforeach
</div>
@endsection