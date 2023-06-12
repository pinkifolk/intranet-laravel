<div>
    <div class="flex justify-between">
        <input type="text" class="px-4 py-2 w-auto block border border-gray-400 rounded-lg" wire:model="search"
            name="search" placeholder="Buscar">
        <button id="open" type="button" class="bg-green-700 rounded-md px-4 text-white" data-modal-target="add"
            data-modal-toggle="add">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    @if ($resultSearch->count())
    <div class="relative overflow-auto shadow-xl border-gray-400 rounded-md mt-5">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-400">
                <tr>
                    <th class="py-2 text-center">N°</th>
                    <th>Titulo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultSearch as $item)
                <tr class="bg-white border-b-2  hover:bg-gray-200 py-2">
                    <td class="text-center">{{$item->id}}</td>
                    <td class="py-2">{{$item->title}}</td>
                    <td class="py-2">
                        <a href="#"><i class="fa-solid fa-pen m-1"></i></a>
                        <a href="#"><i class="fa-solid fa-trash-can m-1"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>no hay datos</p>
    @endif
</div>