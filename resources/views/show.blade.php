@extends('layouts.main')

@section('style')
    
@endsection

@section('content')
    <div class="pcs-info border-b border-gray-800" >
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{asset('/images/equipos/'.$equipo->namefoto)}}" alt="" class="w-64 lg:w-96" style="lg:width: 40rem">
            </div>
            
            <div class="md:ml-24">
               
                <h2 class="text-4xl font-semibold">{{$equipo->user->name}}</h2>
                <div class="flex  flex-wrap items-center text-gray-400 text-sm">
                    <span>{{$equipo->marca->nombremarca}}</span>
                    <span class="mx-1">|</span>
                    <span class="ml-1">{{ $equipo->modelo->nombremodelo }}</span>
                    
                </div>
                <div class="text-gray-300 text-sm">
                    <span class="">Serial:</span>
                    <span class="ml-1">{{ $equipo->serial }}</span>
                    <span class="mx-1">|</span>
                    <span class="">IP:</span>
                    @if ($equipo->ip)
                      <span class="">{{ $equipo->ip }}</span>
                    @else
                        Sin Ip
                    @endif
                    
                </div>
                <div class="text-gray-300 text-sm">
                    <span >{{  'Adquirido: '. \Carbon\Carbon::parse($equipo->fe_adquisicion)->format('M, Y')}}</span>
                </div>
                <p class="text-gray-300 mt-8 text-justify ">
                    {{ $equipo->descripcion }}
                </p>
               
                <a href="/equipos">
                    <div class="mt-12">
                        <button class="flex item-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            Volver
                        </button>
                    </div>
                </a>
                
                
            </div>
            
        </div>

        <div class="ml-16 mb-5">
            <livewire:agregarfoto :equipo="$equipo">
        </div>

        
    </div>
    <div class="flex justify-center mx-auto p-4 max-w-4xl rounded shadow mb-4">
        <table class="text-sm table-auto ">
            <head>
              <tr class="bg-gray-700">
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">#</th>
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Nombre</th>
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Fotografia</th>
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Serial</th>
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Marca</th>
                <th class="border-solid border-2 border-gray-600 text-gray-900 px-4 py-1 ">Adquisición</th>
              </tr>
            </head>
            <tbody>
              @forelse ($losmios as $item)
                <tr class="text-center">
                    <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">{{ $item->id }}</td>
                    <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">
                        <a href="{{route('equipos.show', $item->id)}}">
                            <p class=" bg-gray-900 hover:text-green-400  text-gray-600 "> {{ $item->tipoequipo->nombretipo }}</p>
                        </a>
                    </td>
                    <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">
                        <a href="{{route('equipos.show', $item->id)}}">
                            <img src="{{asset('/images/equipos/'.$item->namefoto)}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150 w-24 h-20 py-3"  >
                        </a>
                    </td>
                    <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">
                       <p class=" bg-gray-900 hover:text-green-400  text-gray-600 ">{{ $item->serial }} </p> 
                    </td>
                    <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">
                        <p class=" bg-gray-900 hover:text-green-400  text-gray-600 ">{{ $item->marca->nombremarca }} </p> 
                     </td>
                     <td class="border-solid border-2 border-gray-600 text-gray-600 px-4 py-1">
                        <span >{{ \Carbon\Carbon::parse($item->fe_adquisicion)->format('M, Y')}}</span>
                     </td>
                    
    
                    
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="3" class="py-3 italic">No Tengo más Equipos</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('script')
<script>
   window.livewire.on('alert', param => {
       toastr[param['type']](param['message'], param['type']);
   })
</script>
