@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-2">Usuarios Administradores</h1>
<div class="relative overflow-auto shadow-xl border-gray-400 rounded-md mt-5">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-400">
            <tr>
                <th class="py-2 text-center">N°</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Creacion</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin_get as $key=> $item)
            <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="py-2">{{$item->name}}</td>
                <td class="py-2">{{$item->last_name}}</td>
                <td class="py-2">{{date('d-m-Y',strtotime($item->created_at))}}</td>
                <td class="py-2">
                    @if ($item->estado == 1)
                    <span class="absolute h-3 w-3 rounded-full bg-red-500 ml-4 -mt-1">
                        @else
                        <span class="absolute h-3 w-3 rounded-full bg-green-700 ml-4 -mt-1">
                            @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection