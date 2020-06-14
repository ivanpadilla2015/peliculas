<div>
    @if($updateMode)
        @include('tipo_update')
    @else
        @include('tipo_create')
    @endif
    <table class="text-sm table-auto w-full">
        <head>
          <tr class="bg-gray-700">
            <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">#</th>
            <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Nombre</th>
            <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Acción</th>
          </tr>
        </head>
        <tbody>
          @forelse ($data as $item)
            <tr class="text-center">
                <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">{{ $item->id }}</td>
                <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">{{ $item->nombretipo }}</td>
                <td class="border-solid border-2 border-gray-600 px-4 py-1">
                    <button wire:click="edit({{ $item->id }})" class="px-2 py-1 bg-gray-900 hover:text-green-400 w-8 h-8 text-gray-600 " title="Editar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                    <button wire:click="destroy({{ $item->id }})" onclick="confirm('Confirma Eliminarlo?') || event.stopImmediatePropagation()"  class="px-2 py-1 bg-gray-900 hover:text-red-300 w-8 h-8 text-gray-600 " title="Eliminar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                   
                </td>

                
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="3" class="py-3 italic">No hay información</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $data->links('Pagination-links') }}
</div>
