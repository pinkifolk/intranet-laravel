<div>   
    <div class="flex justify-end">
        <button type="button" class="bg-green-700 rounded-md px-3 py-2 text-white" data-bs-toggle="modal"
            data-bs-target="#uploadCronogram">
            <i class="fa-solid fa-plus"></i>
        </button>
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
                    <th>Fecha</th>
                    <th>Celebracion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultSearch as $key=> $item)
                <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="py-2">{{date('d-m-Y',strtotime($item->date))}}</td>
                    <td class="py-2">{{$item->title}}</td>
                    <td class="py-2">
                        <button wire:click="edit({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#editCronogram"><i class="fa-solid fa-pen m-1"></i></button>
                        <button wire:click="del({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#delCronogram"><i class="fa-solid fa-trash-can m-1"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No existe informacion</p>
    @endif
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="uploadCronogram" tabindex="-1" aria-labelledby="uploadCronogramLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="uploadCronogramLabel">Cargar archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="storeCronogram" enctype="multipart/form-data">
                        @csrf
                        <div class="grid">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fa-solid fa-upload fa-2xl mb-5"></i>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Selecciona tu archivo Excel</span></p>
                                </div>
                                <input id="dropzone-file" type="file" wire:model="file" class="hidden" />
                            </label>
                            <p class="text-xs m-2 text-gray-500">Puedes descargar el Excel de productos de ejemplo aquí: <a class="font-semibold text-xs" href="{{route('cronogram.master')}}">Plantilla de muestra</a></p>
                            
                        </div>
                        <!-- Modal footer -->
                        <div class="px-4 py-2 flex justify-end items-center space-x-4">
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-red-600 transition"
                                data-bs-dismiss="modal" type="button">Cancelar</button>
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-action transition"
                                type="submit" data-bs-dismiss="modal">Cargar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="editCronogram" tabindex="-1" aria-labelledby="editCronogramLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="editCronogramLabel">Editar Celebracion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resert"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="editCronogramData" enctype="multipart/form-data">
                        @csrf
                        <div class="grid">
                            <label class="block tracking-wide font-bold mb-2">Titulo</label>
                            <input type="text" name="title" wire:model="title"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            @error('title')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror
                            <label class="block tracking-wide font-bold mb-2">Fecha</label>
                            <input type="text" name="date" wire:model="date"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            @error('date')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror                      
                            
                        </div>
                        <!-- Modal footer -->
                        <div class="px-4 py-2 flex justify-end items-center space-x-4">
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-red-600 transition"
                                data-bs-dismiss="modal" type="button" wire:click="resert">Cancelar</button>
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-action transition"
                                type="submit" data-bs-dismiss="modal">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="delCronogram" tabindex="-1" aria-labelledby="delCronogramLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="delCronogramLabel">Eliminar Celebracion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <h1 class="text-center text-xl p-6">🚨¿Estas seguro de eliminar este registro?🚨</h1>
                    <form wire:submit.prevent="delCronogramData" enctype="multipart/form-data">
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
