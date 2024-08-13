@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Cronograma de festividades Provaltec</h1>
<ol class="relative border-s border-gray-200 dark:border-gray-700 ml-2"> 
@foreach($get_cronogram as $month => $monthProcedures)
    <li class="mb-10 ms-4">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-bold leading-none text-gray-700">{{ \Carbon\Carbon::parse($month . '-01')->translatedFormat('F Y') }}</time>
        @foreach($monthProcedures as $key => $procedure)
            <h3 class="mt-2 ml-4 text-md font-normal text-gray-900">{{ \Carbon\Carbon::parse($procedure->date)->format('d-m-Y') }}</h3>
            <p class="mb-4 ml-4 text-base font-normal text-gray-500">{{ $procedure->title }}</p>
        @endforeach
    </li>      
    @endforeach
</ol>
<h1 class="h-screen"></h1>
@endsection