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
@if (session()->has('message'))
<div class="flex justify-between mt-4 bg-message bg-gree rounded-md text-white cursor-pointer" id="message">
    <div class="p-2 ml-3 font-bold italic">{{session('message')}}</div>
    <div class="p-2" type="button"><i class="fa-solid fa-xmark"></i></div>
</div>
@endif
@if (session()->has('error'))
<div class="flex justify-between mt-4 bg-message bg-gree rounded-md text-white cursor-pointer" id="message">
    <div class="p-2 ml-3 font-bold italic">{{session('error')}}</div>
    <div class="p-2" type="button"><i class="fa-solid fa-xmark"></i></div>
</div>
@endif
<div class="flex flex-col w-1/2 m-auto mt-5 ">
    <form action="{{route('releases.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block tracking-wide font-bold mb-2">Asunto</label>
        <input type="text" name="subject"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        @error('subject')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Asunto</label>
        <textarea name="body" id="bodyMail" cols="30" rows="10"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"></textarea>
        @error('body')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <label class="block tracking-wide font-bold mb-2">Adjunto</label>
        <input type="file" name="file"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action">
        @error('file')
        <span class="text-red-600">{{$message}}</span>
        @enderror
        <div class="flex mt-2">
            <div class="flex items-center h-5">
                <input type="checkbox" id="value" {{old('value')}} name="onlyOne" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </div>
            <div class="ml-2 text-sm">
                <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Quieres hacer una
                    prueba?</label>
                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">Marca esta
                    opción y solo te enviaremos un correo a ti para que puedas revisar el formato del comunicado.</p>
            </div>
        </div>
        <button class="bg-action block text-white font-bold px-4 py-2 my-5 w-full rounded-md">Enviar</button>
    </form>
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.plugins.addExternal ( 'justify', '{{asset("/build/assets/justify/plugin.js")}}' );
    CKEDITOR.replace('bodyMail',{
        height: 300,
        filebrowserUploadUrl: "{{route('admin.upload',['_token' => csrf_token()])}}",
        filebrowserUploadMethod:'form',
        extraPlugins: 'justify',
    });
</script>
<script>
    const enviar = document.getElementById('send');

    enviar.addEventListener('click', () => {
    enviar.style.display = "none"
    })

</script>
@endsection