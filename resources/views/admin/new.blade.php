@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-5">Agrega nueva Noticias</h1>
<form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid">
        <label class="block tracking-wide font-bold mb-2">Titulo</label>
        <input type="text" name="title"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        @error('title')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Contenido</label>
        <textarea name="description" id="content" cols="20" rows="5"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"></textarea>
        @error('description')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Imagen</label>
        <input type="file" name="image"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action mb-3">
        @error('image')
        <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
    <button class="text-white px-4 py-2 rounded-md bg-action transition" type="submit">Agregar</button>
</form>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
     CKEDITOR.plugins.addExternal ( 'justify', '{{asset("/build/assets/justify/plugin.js")}}' );
     CKEDITOR.replace('content',{
        height: 300,
        filebrowserUploadUrl: "{{route('admin.upload',['_token' => csrf_token()])}}",
        filebrowserUploadMethod:'form',
        extraPlugins: 'justify',
    });
</script>
@endsection