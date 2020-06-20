@extends('layouts.main')

@section('content')
<div class="flex justify-center mx-auto p-4 max-w-4xl rounded shadow mb-4">
    <div class="bg-white text-black rounded px-4 py-4">
        <table class="table-auto ">
            <thead>
            <tr>
                <th class="border  px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Correo</th>
                <th class="border px-4 py-2">Dependencia</th>
                <th class="border px-4 py-2">Acción</th>
            </tr>
            </thead>
            <tbody>
                <?php $n = 1;?>
               @foreach ($user as $item)
                <tr class="@if(($n++%2==0)) bg-gray-100 @endif">
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2">{{ $item->email }}</td>
                    <td class="border px-4 py-2">{{ $item->dependencia->nombredepen }}</td>
                    <td class="border px-4 py-2 @if(($n%2!=0)) bg-gray-100 @endif">
                        <a href="{{route('personal.edit', $item->id)}}">
                            <button class="px-2 py-1  hover:text-green-400 w-8 h-8 text-gray-600 " title="Editar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                        </a>
                        <a href="{{ url('dasativaus', $item->id)}}">
                            <button onclick="return confirm('Confirma Eliminarlo?');" class="px-2 py-1  hover:text-red-300 w-8 h-8 text-gray-600 " title="Eliminar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                        </a>
                        
                    </td>
                   
                </tr>
               @endforeach 
            </tbody>
        </table>
        {{ $user->links() }}
    </div>
 </div>


@endsection