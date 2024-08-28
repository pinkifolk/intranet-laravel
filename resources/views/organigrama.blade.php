@extends('layout.layout')
<style>
    .image-zoom-container {
            position: relative;
            overflow: hidden;
        }

        .image-zoom-container img {
            width: 100%;
            transition: transform 0.2s ease;
        }

        .image-zoom-container:hover img {
            transform: scale(3);
            cursor: zoom-in;
        }
</style>
@section('content')
<h1 class="text-3xl font-bold mb-5">Organigrama</h1>
    <div class="image-zoom-container">
        <img src="img/organigrama.jpeg" alt="Imagen de ejemplo" id="zoom-image">
    </div>
<h1 class="h-screen"></h1>

<script>
   const zoomContainer = document.querySelector('.image-zoom-container')
   const zoomImage = document.getElementById('zoom-image')

    zoomContainer.addEventListener('mousemove', function (e) {
        const { left, top, width, height } = zoomContainer.getBoundingClientRect()
        const x = (e.clientX - left) / width * 100
        const y = (e.clientY - top) / height * 100
        zoomImage.style.transformOrigin = `${x}% ${y}%`
    })
</script>
@endsection
