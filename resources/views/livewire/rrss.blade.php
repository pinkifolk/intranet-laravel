<div>
    <div class="flex justify-between">
        <input type="text" class="px-4 py-2 w-auto block border border-gray-400 rounded-lg" wire:model="search"
            name="search" placeholder="Buscar">
        <button type="button" class="bg-green-700 rounded-md px-4 text-white" data-bs-toggle="modal"
            data-bs-target="#createRRSS">
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
                    <th>Cuerpo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultSearch as $key=> $item)
                <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="py-2">{{Str::limit($item->detail,50)}}</td>
                    <td class="py-2">
                        <button wire:click="edit({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#editRRSS"><i class="fa-solid fa-pen m-1"></i></button>
                        <button wire:click="del({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#delRRSS"><i class="fa-solid fa-trash-can m-1"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No existe informacion</p>
    @endif
    <!-- Modal create -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="createRRSS" tabindex="-1" aria-labelledby="createRRSSLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="createRRSSLabel">Nueva Publicación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="storeRRSSData">
                        @csrf
                        <div class="grid">
                            <label class="block tracking-wide font-bold mb-2">Publicación</label>
                            <textarea name="body" cols="20" rows="20" wire:model="body" placeholder=" Hola {{auth()->user()->name}}, comentanos cuál fue la publicación de hoy"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white whitespace-pre-wrap"></textarea>
                            @error('body')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror
                            <label class="block tracking-wide font-bold mb-2">Imagen</label>
                            <input type="file" name="file" wire:model="file"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action">
                            @error('file')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror

                        </div>
                        <!-- Modal footer -->
                        <div class="px-4 py-2 flex justify-end items-center space-x-4">
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-red-600 transition"
                                data-bs-dismiss="modal" type="button">Cancelar</button>
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-action transition"
                                type="submit" data-bs-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="editRRSS" tabindex="-1" aria-labelledby="editRRSSLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="editRRSSLabel">Editar Publicación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resert"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="editRRSSData" enctype="multipart/form-data">
                        @csrf
                        <div class="grid">
                            <label class="block tracking-wide font-bold mb-2">Publicación</label>
                            <textarea name="body" cols="20" rows="20" wire:model="body"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white whitespace-pre-wrap"></textarea>
                            @error('body')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror
                            <label class="block tracking-wide font-bold mb-2">Imagen</label>
                            <input type="file" name="file" wire:model="file"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action">
                            @error('file')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- Modal footer -->
                        <div class="px-4 py-2 flex justify-end items-center space-x-4">
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-red-600 transition"
                                data-bs-dismiss="modal" type="button" wire:click="resert">Cancelar</button>
                            <button class="bg-aside text-white px-4 py-2 rounded-md hover:bg-action transition"
                                type="submit" data-bs-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete  -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="delRRSS" tabindex="-1" aria-labelledby="delRRSSLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="delRRSSLabel">Eliminar Publicación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <h1 class="text-center text-xl p-6">🚨¿Estas seguro de eliminar este registro?🚨</h1>
                    <form wire:submit.prevent="delRRSSData" enctype="multipart/form-data">
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

