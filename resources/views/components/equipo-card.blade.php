<div class="mt-8"> <!-- inicio  -->
    <a href="{{route('equipos.show', $equipo->id)}}">
        <img src="{{asset('/images/equipos/'.$equipo->namefoto)}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150" width="200" height="300"  >
    </a>
    <div class="mt-2">
        <a href="{{route('equipos.show', $equipo->id)}}" class="text-lg mt-2 hover:text-gray-300">{{$equipo->user->name}}</a>
        <div class="flex items-center text-gray-400 text-sm">
            <span>{{$equipo->marca->nombremarca}}</span>
            <span class="mx-1">|</span>
            <span class="ml-1">{{ $equipo->modelo->nombremodelo }}</span>
            
        </div>
        <div class="text-gray-300 text-sm">
            <span >{{  'Adquirido: '. \Carbon\Carbon::parse($equipo->fe_adquisicion)->format('M, Y')}}</span>
            <span class="mx-1">|</span>
            <span class=""><a href="{{route('equipos.edit', $equipo->id)}}" class="hover:text-orange-500 font-semibold" title="Editar Equipo" >Editar</a></span>
        </div>
         
    </div>
</div><!--  fin  -->