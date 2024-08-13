@extends('layout.layout')
@section('content')
<div class="flex flex-col gap-1">
    <div class="w-[700px] m-auto">
        <img src="../{{$department->url_img}} " alt="">
    </div>
    <div class="text-3xl font-bold p-5">
        {{$department->name}}        
    </div>
    <div class="p-5 text-md font-base">
        {{$department->detail}}
    </div>         
    <div class="grid grid-cols-{{$grid}} grid-cols-1 grid-cols-4 grid-cols-5 gap-4">
        @foreach ($response as $item)
        <button onclick="showItem('{{$item->route_img}}','{{$item->name.' '.$item->last_name}}','{{$item->job_title}}','{{$item->extension}}','{{ date('d-m-Y', strtotime($item->birthday)) }}','{{$item->personal_contact}}','{{$item->emergency_contact}}','{{$item->email}}')">
            <div class="my-6 w-30 text-center">
                <img src="../{{$item->route_img}}" alt="{{$item->img_alt}}" title="{{$item->title_alt}}" style="width:8rem; height:8rem;"
                        class="rounded-full w-24 m-auto">
                <h3 class="font-bold mt-2">{{$item->name}} {{$item->last_name}}</h3>
                <span>{{$item->job_title}}</span>            
            </div>
        </button>
        @endforeach         
    </div>
    <div class="m-auto w-full">
        <div class="text-3xl font-bold p-5"><i class="fa-solid fa-location-dot mr-2"></i>Ubicación en la empresa</div>
        <div class="w-[700px] m-auto">            
            <img src="../{{$department->url_location}}" alt="">
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function showItem(img,nombre,job_title,extension,fecha,phone,emergency,email){
            document.getElementById('imgUser').src = `../${img}`
            document.getElementById('nameUser').textContent = nombre
            document.getElementById('jobTitleUser').textContent = job_title
            document.getElementById('phoneUser').textContent = extension    
            document.getElementById('birthdayUser').textContent = fecha
            document.getElementById('celUser').textContent = phone
            document.getElementById('emergencyPhoneUser').textContent = emergency
            document.getElementById('emailUser').textContent = email            
        }
    </script>
@endsection