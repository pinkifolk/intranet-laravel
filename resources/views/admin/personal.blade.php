@extends('layouts.app')

@section('content')
<h1>colaboradores</h1>
<form action="{{route('personal.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nombre</label>
    <input type="text" name="name" class="disabled:opacity-75">
    <label>Apellido</label>
    <input type="text" name="lastName" class="disabled:opacity-75">
    <label>Cargo</label>
    <input type="text" name="jobTitle" class="disabled:opacity-75">
    <label>Anexo</label>
    <input type="text" name="extension" class="disabled:opacity-75">
    <label>Departamento</label>
    <select name="department">
        <option value="0">Seleccione Departamento</option>
        @foreach ($department_get as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <label>Cumpleaños</label>
    <input type="date" name="birthday" class="disabled:opacity-75">
    <label>Correo</label>
    <input type="email" name="email" class="disabled:opacity-75">
    <label>Correo Personal</label>
    <input type="email" name="emailPersonal" class="disabled:opacity-75">
    <label>Imagen Perfil</label>
    <input type="file" name="file">
    <button>Crear</button>
</form>
<div>
    @foreach ($personal_get as $item)
    <li>{{$item->name}}</li>
    <li>{{$item->last_name}}</li>
    @endforeach
</div>
@endsection