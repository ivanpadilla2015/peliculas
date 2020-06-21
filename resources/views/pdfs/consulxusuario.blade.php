@extends('layouts.main')

@section('content')
<!-- Lorem20   -->
<form class="w-full max-w-lg mx-auto mt-20" action="{{ route('xusuario') }}" method="GET">
  @csrf
  <div class=" bg-gray-400 px-3 py-3 rounded">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Usuario
                </label>
                <div class="relative">
                    <select name="id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
                        <option value="0">Seleccione</option>
                        @foreach ($users as $user)
                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                        @endforeach 
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <p class="text-red-500 text-xs italic">{{ $errors->first('id') }}</p>
            </div>
        </div> 
        <div class="md:flex md:items-center">
            
            <div class="">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                   Generar Pdf
                </button>
            </div>
            <div class="ml-2">
                <a href="/equipos" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
                
            </div>
        </div>
  </div>
  
 </form>
@endsection