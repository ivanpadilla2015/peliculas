@extends('layouts.main')

@section('content')

<form class="w-full max-w-lg mx-auto mt-5" action="{{route('dependen.update', $depe->id) }}"  method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class=" bg-gray-400 px-3 py-3 rounded">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Nombre
                </label>
            <input name="nombredepen" value="{{ $depe->nombredepen }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Nombre dependencia">
                <p class="text-red-500 text-xs italic">{{ $errors->first('nombredepen') }}</p>
            </div>
        </div>
        <div class="md:flex md:items-center">
            
            <div class="">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Grabar
                </button>
            </div>
            <div class="ml-2">
                <a href="/dependen" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
                
            </div>
        </div>
    </div>
</form>

@endsection