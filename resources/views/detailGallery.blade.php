@extends('layout.layout')
@section('content')
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($result as $item)
    <div class="grid gap-4">
        <div>
            <img id="img" class="h-auto max-w-full rounded-lg  cursor-pointer" onclick="showImage(this)"
                data-img-url="{{ asset($item->url_img) }}" src="{{asset($item->url_img)}}" alt="">
        </div>
    </div>
    @endforeach
</div>
<div class="ful-img" id="fulImgBox">
    <img src="" id="fulImg" alt="">
    <span onclick="closeImg()"><i class="fa-solid fa-x fa-2xs"></i></span>
    <div class="boton-left">
        <button class="text-white" onclick="cambiarImagen('anterior')"><i
                class="fa-solid fa-chevron-left fa-2xl"></i></button>
    </div>
    <div class="boton-right">
        <button class="text-white" onclick="cambiarImagen('siguiente')"><i
                class="fa-solid fa-chevron-right fa-2xl"></i></button>
    </div>
</div>
<h1 class="h-screen"></h1>
<script src="https://code.jquery.com/jquery-3.7.0.slim.js"
    integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
<script type="text/javascript">
    const fulImgBox = document.getElementById("fulImgBox")
    fulImg = document.getElementById("fulImg");
    var imagenes = {!! json_encode($result->pluck('url_img')->all()) !!};
    var indiceActual = 0;
    var imgElement = document.getElementById('img');

    function closeImg(){
    fulImgBox.style.display = "none";
    }

    function showImage(imgElement) {
    var imageUrl = imgElement.getAttribute('data-img-url');
    fulImgBox.style.display = "flex";
    fulImg.src = imageUrl
    }
    function show(imageUrl){
        fulImgBox.style.display = "flex";
        fulImg.src = '{{ asset('') }}' + imageUrl
    }

    function cambiarImagen(direccion) {
    if (direccion === 'anterior') {
    indiceActual = (indiceActual - 1 + imagenes.length) % imagenes.length;
    } else if (direccion === 'siguiente') {
    indiceActual = (indiceActual + 1) % imagenes.length;
    }
    show(imagenes[indiceActual]);
    }
</script>
@endsection