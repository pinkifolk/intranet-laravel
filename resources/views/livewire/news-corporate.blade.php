<div>
    <div class="flex justify-between">
        <input type="text" class="px-4 py-2 w-auto block border border-gray-400 rounded-lg" wire:model="search"
            name="search" placeholder="Buscar">

        <a href="{{route('news.new')}}" class="bg-green-700 rounded-md px-4 text-white">
            <i class="fa-solid fa-plus pt-2"></i>
        </a>
    </div>
    @if (session()->has('message'))
    <div class="flex justify-between mt-4 bg-message rounded-md text-white cursor-pointer" id="message">
        <div class="p-2 ml-3 font-bold italic">{{session('message')}}</div>
        <div class="p-2" type="button"><i class="fa-solid fa-xmark"></i></div>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="flex justify-between mt-4 bg-red-500 rounded-md text-white cursor-pointer" id="message">
        <div class="p-2 ml-3 font-bold italic">{{session('error')}}</div>
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
                    <th>Accion</th>
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
                    <td>
                        <button wire:click="del({{$item->id}})" type="button" data-bs-toggle="modal" data-bs-target="#delNew"><i class="fa-solid fa-trash-can m-1"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No existe informacion</p>
    @endif
    <!-- Modal delete -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal" id="delNew"
        tabindex="-1" aria-labelledby="delNewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="delNewLabel">Eliminar Noticia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <h1 class="text-center text-xl p-6">🚨¿Estas seguro de eliminar este registro?🚨</h1>
                    <form wire:submit.prevent="delnew">
                        @csrf

                </div>
                <!-- Modal footer -->
                <div class="px-4 py-2 flex justify-end items-center space-x-4">
                    <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-action transition"
                        data-bs-dismiss="modal" type="button">Cancelar</button>
                    <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-red-600 transition" type="submit"
                        data-bs-dismiss="modal">Eliminar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>