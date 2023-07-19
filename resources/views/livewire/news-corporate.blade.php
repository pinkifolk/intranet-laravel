<div>
    <div class="flex justify-between">
        <input type="text" class="px-4 py-2 w-auto block border border-gray-400 rounded-lg" wire:model="search"
            name="search" placeholder="Buscar">

        <a href="{{route('news.new')}}" class="bg-green-700 rounded-md px-4 text-white">
            <i class="fa-solid fa-plus m-auto"></i>
        </a>
    </div>
    @if (session()->has('message'))
    <div class="flex justify-between mt-4 bg-message bg-gree rounded-md text-white cursor-pointer" id="message">
        <div class="p-2 ml-3 font-bold italic">{{session('message')}}</div>
        <div class="p-2" type="button"><i class="fa-solid fa-xmark"></i></div>
    </div>
    @endif

    @if ($resultSearch->count())
    <div class="relative overflow-auto shadow-xl border-gray-400 rounded-md mt-5">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-400">
                <tr>
                    <th class="py-2 text-center">N°</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultSearch as $key=> $item)
                <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="py-2 text-black hover:text-blue-500"><a
                            href="{{route('news.edit',$item)}}">{{$item->title}}</a>
                    </td>
                    <td class="py-2">{{date('d-m-Y',strtotime($item->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No existe informacion</p>
    @endif
</div>