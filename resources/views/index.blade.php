@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Todos Los Equipos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                
                @foreach ($equipos as $equipo)
                <x-equipo-card :equipo=$equipo />
                @endforeach
  
            </div>
            
        </div> <!-- fin pimeras ***************************************************************************-->

        <div class="no-popular-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Electrodomesticos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               
                @foreach ($equipos as $equipo)
                <x-equipo-card :equipo=$equipo />
                @endforeach
               
            </div>
            
        </div>
 

    </div>
@endsection