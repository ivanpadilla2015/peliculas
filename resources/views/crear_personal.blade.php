@extends('layouts.main')

@section('content')
<!-- Lorem20   -->
<form class="w-full max-w-lg mx-auto mt-5" action="/personal" method="POST">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
              Nombre Completo 
            </label>
            <input name="name" value="{{ old('name') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Name">
            <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
        </div>
  </div><!--  Fin Usuario -->
  <div class="flex flex-wrap -mx-3 mb-2"> <!-- 3 Campos -->
    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0"> <!--  correo    -->
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Correo
      </label>
      <input name="email" value="{{ old('email') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="email" placeholder="email">
      <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
    </div> <!-- Fin Correo    -->
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Contraseña
      </label>
      <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="password" placeholder="password">
      <p class="text-red-500 text-xs italic">{{ $errors->first('password') }}</p>
    </div>
  </div>   
  <div class="flex flex-wrap -mx-3 mb-2"> <!-- 3 Campos -->
    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0"> <!--  Tipo    -->
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Dependencia
      </label>
      <div class="relative">
        <select name="dependencia_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
          <option value="0">Seleccione</option>
          @foreach ($depen as $depe)
            <option value="{{ $depe['id'] }}">{{ $depe['nombredepen'] }}</option>
          @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
     </div>
     <p class="text-red-500 text-xs italic">{{ $errors->first('dependencia_id') }}</p>
    </div> <!-- Fin Tipo    -->
  </div>
     <div class="md:flex md:items-center mt-5">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
         Grabar
        </button>
      </div>
     
    </div>

  </form>
@endsection