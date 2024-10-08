@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-5">Noticias</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    @foreach ($get_all as $item)
    <div>
        <a href="{{route('post.show',$item->slug)}}">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                        {{$item->title}}</h5>
                    <p class="mb-3 font-normal text-gray-700">
                        {!!Str::limit($item->description,500)!!}</p>
                    <span class="text-xs text-slate-600">
                        Pubicado:
                        <i class="fa-regular fa-clock fa-md"></i>
                        {{date('d-m-Y',strtotime($item->created_at))}}
                    </span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
{{ $get_all->links() }}
@endsection