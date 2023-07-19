@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-5">Editando una Noticia</h1>
<form action="{{route('news.update',$retunItem)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="grid">
        <label class="block tracking-wide font-bold mb-2">Titulo</label>
        <input type="text" name="title" value="{{$retunItem->title}}"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        @error('title')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Contenido</label>
        <textarea name="description" id="content" cols="20" rows="5"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        {{$retunItem->description}}
    </textarea>
        @error('description')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold">Imagen</label>
        @if ($retunItem->imagen)
        <div class="my-5 p-5 border-4 border-gray-500 text-center">
            <a href="{{asset($retunItem->imagen)}}" target="_blank">
                <i class="fa-solid fa-image fa-2xl"></i>
            </a>
        </div>
        @else
        <input type="file" name="image"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action mb-3">
        @error('image')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        @endif
    </div>
    <button class="text-white px-4 py-2 rounded-md bg-action transition" type="submit">Actualizar</button>
</form>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection