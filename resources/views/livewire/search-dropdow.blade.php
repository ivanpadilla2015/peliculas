<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="busqueda" type="text" class="bg-gray-800 rounded-full text-sm w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
    placeholder="Buscar" @focus="isOpen = true"
    @keydown="isOpen = true"
    @keydown.escape.window="isOpen = false"
    @keydown.shift.tab="isOpen = false"
    >
    <div class="absolute top-0">
        <svg class="w-4 mt-2 ml-2 fill-current text-gray-500"  aria-hidden="true" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
    </div>
    
    <div wire:loading class="loader ease-linear rounded-full border-2 bg-gray-800 top-0 right-0 mr-4 mt-1 h-4 w-4"></div>

    @if (strlen($busqueda) >= 2 )
        <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4" 
          x-show.transition.opacity="isOpen" >
            @if($busquedaResuls->count() > 0)
                <ul>
                    @foreach ($busquedaResuls as $equipo)
                        <li class="border-b border-gray-700">
                            <a href="{{route('equipos.show', $equipo->usuario_id)}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out
                                duration-150"
                                @if ($loop->last) @keydown.tab="isOpen = false" @endif
                            >

                                <img src="{{asset('/images/equipos/'.$equipo->namefoto)}}" alt="" class="w-8">
                                <span class="ml-4">{{ $equipo->name }}</span>
                            </a>
                        </li>
                    @endforeach
                    
                </ul>

        @else
                <div class="px-3 py-3">No Hay Resultado "{{ $busqueda }}" </div>   
        @endif
        </div>
    @endif
</div>