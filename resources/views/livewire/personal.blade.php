<div>
    <div class="flex justify-between">
        <input type="text" class="px-4 py-2 w-auto block border border-gray-400 rounded-lg" wire:model="search"
            name="search" placeholder="Buscar">
        <button type="button" class="bg-green-700 rounded-md px-4 text-white" data-bs-toggle="modal"
            data-bs-target="#createPersonal">
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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Anexo</th>
                    <th>Cumpleaños</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultSearch as $key=> $item)
                <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="py-2">{{$item->name}}</td>
                    <td class="py-2">{{$item->last_name}}</td>
                    <td class="py-2">{{$item->job_title}}</td>
                    <td class="py-2">{{$item->extension}}</td>
                    <td class="py-2">{{date('d-m-Y',strtotime($item->birthday))}}</td>
                    <td class="py-2">{{$item->email}}</td>
                    <td class="py-2">
                        @if ($item->estado == 1)
                        <span class="absolute h-3 w-3 rounded-full bg-red-500 ml-4 -mt-1">
                            @else
                            <span class="absolute h-3 w-3 rounded-full bg-green-700 ml-4 -mt-1">
                                @endif
                    </td>
                    <td class="py-2">
                        <button wire:click="edit({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#editPersonal"><i class="fa-solid fa-pen m-1"></i></button>
                        <button wire:click="del({{$item->id}})" type="button" data-bs-toggle="modal"
                            data-bs-target="#delUser"><i class="fa-solid fa-trash-can m-1"></i></button>
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
        id="createPersonal" tabindex="-1" aria-labelledby="createPersonalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-4xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="createPersonalLabel">Nuevo Colaborador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="storePersonalData" enctype="multipart/form-data">
                        @csrf
                        <div class="md:flex md:items-center mb-4">
                            <div class="px-3">
                                <label class="block tracking-wide font-bold mb-2">Tipo</label>
                            </div>
                            <div class="w-1/4">
                                <select name="type" wire:model="type"
                                    class="block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Gerente</option>
                                    <option value="2">Jefe de Area</option>
                                    <option value="3">Trabajador</option>
                                </select>

                                @error('type')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide font-bold mb-2">
                                    Nombre
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="text" name="name" wire:model="name">
                                @error('name')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Apellido
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="lastName" wire:model="lastName">
                                @error('lastName')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Cargo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="jobTitle" wire:model="jobTitle">
                                @error('jobTitle')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/5 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Anexo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="extension" wire:model="extension">
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Departamento
                                </label>
                                <select name="department" wire:model="department"
                                    class=" block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach ($department_get as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-4">
                                <label class="block tracking-wide font-bold mb-2">
                                    Cumpleaños
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="date" name="birthday" wire:model="birthday">
                                @error('birthday')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide font-bold mb-2">
                                    Correo Corporativo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="email" name="email" wire:model="email">
                                @error('email')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Correo Personal
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="email" name="emailPersonal" wire:model="emailPersonal">
                                @error('emailPersonal')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Telefono Emergencia
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="emergencyContact" placeholder="+569 9124 4523"
                                    wire:model="emergencyContact">
                                @error('emergencyContact')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide font-bold mb-2">
                                    Contraseña
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="password" name="password" wire:model="password">
                                @error('password')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Repetir Contraseña
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="password" name="repitPassword" wire:model="repitPassword">
                                @error('repitPassword')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" value="" class="block tracking-wide font-bold"
                                            name="isAdmin" wire:model="isAdmin">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label class="block tracking-wide font-bold">Administrador</label>
                                        <p class="text-xs font-normal tracking-wide">El usuario Administrador tiene la
                                            opción de ingresar a este módulo y realizar modificaciones</p>
                                    </div>
                                    @error('isAdmin')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-3 mb-3 pb-3 border-b-2">
                            <label class="block tracking-wide font-bold mb-2">
                                Imagen
                            </label>
                            <input
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action"
                                type="file" name="file" wire:model="file">
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
        id="editPersonal" tabindex="-1" aria-labelledby="editPersonalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-4xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="editPersonalLabel">Edit Colaborador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="editPersonalData" enctype="multipart/form-data">
                        @csrf
                        <div class="md:flex md:items-center mb-4">
                            <div class="px-3">
                                <label class="block tracking-wide font-bold mb-2">Tipo</label>
                            </div>
                            <div class="w-1/4">
                                <select name="type" wire:model="type"
                                    class="block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Gerente</option>
                                    <option value="2">Jefe de Area</option>
                                    <option value="3">Trabajador</option>
                                </select>

                                @error('type')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide font-bold mb-2">
                                    Nombre
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="text" name="name" wire:model="name">
                                @error('name')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Apellido
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="lastName" wire:model="lastName">
                                @error('lastName')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Cargo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="jobTitle" wire:model="jobTitle">
                                @error('jobTitle')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/5 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Anexo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="extension" wire:model="extension">
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Departamento
                                </label>
                                <select name="department" wire:model="department"
                                    class=" block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach ($department_get as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-4">
                                <label class="block tracking-wide font-bold mb-2">
                                    Cumpleaños
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="birthday" wire:model="birthday">
                                @error('birthday')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide font-bold mb-2">
                                    Correo Corporativo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="email" name="email" wire:model="email">
                                @error('email')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Correo Personal
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="email" name="emailPersonal" wire:model="emailPersonal">
                                @error('emailPersonal')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block tracking-wide font-bold mb-2">
                                    Telefono Emergencia
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text" name="emergencyContact" placeholder="+569 9124 4523"
                                    wire:model="emergencyContact">
                                @error('emergencyContact')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/3 px-3">
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" value="" class="block tracking-wide font-bold"
                                            name="isAdmin" wire:model="isAdmin">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label class="block tracking-wide font-bold">Administrador</label>
                                        <p class="text-xs font-normal tracking-wide">El usuario Administrador tiene la
                                            opción de ingresar a este módulo y realizar modificaciones</p>
                                    </div>
                                    @error('isAdmin')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-3 mb-3 pb-3 border-b-2">
                            @if ($file)
                            <div class="w-52 h-52">
                                <div class="text-right">
                                    <button type="button" wire:click="delimg"><i class="fa-solid fa-x"></i></button>
                                </div>
                                <img src="/intranet/{{$file}}" alt="a" class="w-52 h-52">
                            </div>
                            @else
                            <label class="block tracking-wide font-bold mb-2">
                                Imagen
                            </label>
                            <input
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-aside file:text-white hover:file:bg-action"
                                type="file" name="file" wire:model="file">
                            @error('file')
                            <span class="text-red-600">{{$message}}</span>
                            @enderror
                            @endif

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
    <!-- Modal delete -->
    <div wire:ignore.self
        class="fixed hidden z-40 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal"
        id="delUser" tabindex="-1" aria-labelledby="delUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="mx-auto shadow-xl rounded-md bg-white max-w-xl">
                <div class="flex justify-between items-center bg-aside text-white text-xl rounded-t-md px-4 py-2">
                    <h1 class="modal-title fs-5" id="delUserLabel">Eliminar Colaborador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></button>
                </div>
                <div class="p-4">
                    <h1 class="text-center text-xl p-6">🚨¿Estas seguro de eliminar este registro?🚨</h1>
                    <form wire:submit.prevent="delUserData" enctype="multipart/form-data">
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