@extends('layout.layout')
@section('content')
<div class="mx-auto h-screen bg-cover bg-fixed bg-center bg-no-repeat shadow-lg"
    style="background-image:url('{{asset($department->url_img)}}');">
</div>
<div class="-mt-64">
    <div class="bg-white">
        <div class="text-3xl font-bold p-5">
            {{$department->name}}
        </div>
        <div class="p-5 text-md font-base">
            {{$department->detail}}
        </div>
        <div class="p-5 text-md font-base">
            {{$department->detail}}
        </div>
    </div>
</div>
@endsection