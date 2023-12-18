@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-5">Editando una Noticia</h1>
<form action="{{route('news.update',$news)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="grid">
        <label class="block tracking-wide font-bold mb-2">Titulo</label>
        <input type="text" name="title" value="{{$news->title}}"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        @error('title')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Contenido</label>
        <textarea name="description" id="content" cols="20" rows="5"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        {{$news->description}}
    </textarea>
        @error('description')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold">Imagen</label>
        @if ($news->imagen)
        <div class="my-5 p-5">
            <button type="button" id="del" name="del">
                <i class="fa-solid fa-x"></i>
            </button>
            <img src="{{asset($news->imagen)}}" name="image" class="w-52 h-52 rounded-md">
            <input type="text" name="image" value="{{$news->imagen}}" hidden>
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
    CKEDITOR.plugins.addExternal ( 'justify', '{{asset("/build/assets/justify/plugin.js")}}' );
    CKEDITOR.replace('content',{
        extraPlugins: 'justify',
    });
    
</script>
@endsection