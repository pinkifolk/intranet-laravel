@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-2">Comunicados</h1>
<div class="">
    <h4 class=" text-xl font-semibold">
        Coméntanos cuál es el comunicado que quieres enviar
    </h4>
    <p class="text-sm">Enviaremos este comunicado al correo de cada colaborador registrado en nuestra plataforma, solo
        debes ingresar el
        asunto, el cuerpo y un adjunto si es necesario. Nosotros nos encargaremos del formato y de los correos.</p>
</div>
<div class="flex flex-col w-1/2 m-auto mt-5 ">
    <form action="{{route('releases.store')}}" method="POST">
        @csrf
        <label class="block tracking-wide font-bold mb-2">Asunto</label>
        <input type="text" name="subject"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        @error('text')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Asunto</label>
        <textarea name="body" id="" cols="30" rows="10"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"></textarea>
        @error('body')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Adjunto</label>
        <input type="file" name="file" wire:model="file"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action">
        @error('file')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <button class="bg-action block text-white font-bold px-4 py-2 my-5 w-full rounded-md">Enviar</button>
    </form>
</div>
@endsection