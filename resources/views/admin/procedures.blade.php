@extends('layouts.app')

@section('content')
<h1>procedimientos</h1>
<form action="{{route('procedures.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Titulo</label>
    <input type="text" name="title" class="disabled:opacity-75">
    <label>Descripcion</label>
    <textarea name="description" cols="30" rows="10"></textarea>
    <label>Documento</label>
    <input type="file" name="file">
    <button>Crear</button>
</form>
@endsection