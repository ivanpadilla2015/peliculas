@extends('layouts.main')

@section('content')
<div class="flex justify-center mx-auto p-4 max-w-4xl rounded shadow mb-4">
    <div class="bg-white text-black rounded px-4 py-4">
        <a href="{{route('dependen.create')}}">
            <button class="px-2 py-1  hover:text-green-400 w-10 h-10 text-gray-600 " title="Nueva Dependencia">
                <svg aria-hidden="true" data-prefix="fas" data-icon="plus-square" class="svg-inline--fa fa-plus-square fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"/></svg>
            </button>
        </a>
        <table class="table-auto ">
            <thead>
            <tr>
                <th class="border  px-4 py-2">No</th>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Acción</th>
            </tr>
            </thead>
            <tbody>
                <?php $n = 1;?>
               @foreach ($depen as $item)
                <tr class="@if(($n++%2==0)) bg-gray-100 @endif">
                    <td class="border px-4 py-2">{{ $item->id }}</td>
                    <td class="border px-4 py-2">{{ $item->nombredepen }}</td>
                    <td class="border px-4 py-2 @if(($n%2!=0)) bg-gray-100 @endif"><!-- $n para color fondo -->
                        <a href="{{route('dependen.edit', $item->id)}}">
                            <button class="px-2 py-1  hover:text-green-400 w-8 h-8 text-gray-600 " title="Editar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                        </a>
                 
                    </td>
                   
                </tr>
               @endforeach 
            </tbody>
        </table>
        {{ $depen->links() }}
    </div>
 </div>



@endsection