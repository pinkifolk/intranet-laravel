@extends('layout.layout')
@section('content')
<h1>equipo</h1>

<div class="organigram">
    <ul>
        {{-- <li><a href="#">Marta</a></li> --}}
        <li><a href="#">Armando</a>
            <ul>
                <li>
                    <a href="#">Daniel</a>
                    <ul>
                        <li><a href="#">Daniel</a>
                            <ul>
                                <li><a href="#">Katherine</a></li>
                                <li><a href="#">Jonathan</a></li>
                                <li><a href="#">Roberto</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Felipe</a>
                    <ul>
                        <li><a href="#">Robert</a></li>
                    </ul>
                </li>
                <li><a href="#">Mauricio</a>
                    <ul>
                        <li><a href="#">Sebastian</a></li>
                    </ul>
                </li>
                <li><a href="#">David</a></li>
                <li><a href="#">Nicolas</a>
                    <ul>
                        <li><a href="#">Marcela</a></li>
                        <li><a href="#">Victor</a></li>
                        <li><a href="#">Hector</a></li>
                        <li><a href="#">Franco</a></li>
                    </ul>
                </li>
                <li><a href="#">Mario</a>
                    <ul>
                        <li><a href="#">Patricia</a></li>
                        <li><a href="#">Karina</a></li>
                        <li><a href="#">Paz</a></li>
                        <li><a href="#">Mauricio</a></li>
                    </ul>
                </li>
                <li><a href="#">Alvaro</a>
                    <ul>
                        <li><a href="#">Juan</a>
                            <ul>
                                <li><a href="#">Matias</a>
                                    <ul>
                                        <li><a href="#">James</a></li>
                                        <li><a href="#">Sebastian</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Adolfo</a>
                                    <ul>
                                        <li><a href="#">David</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Giovanni</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li></li>
    </ul>
</div>

{{-- <div class="grid grid-cols-12 gap-4">
    <div class="col-start-6 bg-slate-400 text-center">
        <div class="flex flex-col">
            <div>Nombre</div>
            <div>Cargo</div>
        </div>
    </div>
    <div class="bg-slate-500 text-center">
        <div class="flex flex-col">
            <div>Nombre</div>
            <div>Cargo</div>
        </div>
    </div>
    <div class="col-start-1 col-end-13 bg-slate-500">
        <div class="grid grid-cols-7">
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
            <div>A</div>
        </div>
    </div>
</div> --}}
{{-- @foreach ($team_get as $item)
<li>{{$item->name}}</li>
<li>{{$item->last_name}}</li>
<li>{{$item->job_title}}</li>
@endforeach --}}

@endsection