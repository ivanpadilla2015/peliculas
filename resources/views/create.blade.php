@extends('layouts.main')

@section('content')
<!-- Lorem20   -->
<form class="w-full max-w-lg mx-auto mt-5" action="/equipos" enctype="multipart/form-data" method="POST">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
              Usuario
            </label>
            <div class="relative">
              <select name="user_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
                <option value="0">Seleccione</option>
                @foreach ($users as $user)
                  <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                @endforeach 
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
              
            </div>
            <p class="text-red-500 text-xs italic">{{ $errors->first('user_id') }}</p>
          </div>
  </div><!--  Fin Usuario -->
    <!--  Descripcion larga -->
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="grid-state">
         Descripción Larga
        </label>
        <textarea name="descripcion" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="descripcion"  rows="3">{{ old('descripcion') }}</textarea>
        <p class="text-red-500 text-xs italic">{{ $errors->first('descripcion') }}</p>
      </div>
   </div><!-- fin  Descripcion larga -->

     
    <div class="flex flex-wrap -mx-3 mb-2"> <!-- 3 Campos -->
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"> <!--  Tipo    -->
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
              Tipo
            </label>
            <div class="relative">
                <select name="tipoequipo_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
                  <option value="0">Seleccione</option>
                  @foreach ($tipos as $tipo)
                    <option value="{{ $tipo['id'] }}">{{ $tipo['nombretipo'] }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <p class="text-red-500 text-xs italic">{{ $errors->first('tipoequipo_id') }}</p>
        </div> <!-- Fin Tipo    -->
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            marca
          </label>
          <div class="relative">
            <select name="marca_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
              <option value="0">Seleccione</option>
              @foreach ($marcs as $marca)
                <option value="{{ $marca['id'] }}">{{ $marca['nombremarca'] }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"> <!-- modelo Tipo    -->
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Modelo
          </label>
          <div class="relative">
            <select name="modelo_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
              <option value="0">Seleccione</option>
              @foreach ($modlos as $model)
                <option value="{{ $model['id'] }}">{{ $model['nombremodelo'] }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        <p class="text-red-500 text-xs italic">{{ $errors->first('modelo_id') }}</p>
        </div> <!--fin modelo  Tipo    -->
    </div>  <!-- fin  3 Campos -->
   
    <div class="flex flex-wrap -mx-3 mb-2"> <!-- 2 Campos -->
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        serial
        </label>
      <input name="serial" value="{{  old('serial') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Serial">
        <p class="text-red-500 text-xs italic">{{ $errors->first('serial') }}</p>
       
      </div>
      
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
          Fecha Aquisición
        </label>
        <!-- <?php // echo date("Y-m-d");?>-->
      <input name="fe_adquisicion" value="{{  old('fe_adquisicion')  }}"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-7 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="date" placeholder="fecha">
        <p class="text-red-500 text-xs italic">{{ $errors->first('fe_adquisicion') }}</p>
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Sap
        </label>
        <input name="sap" value="{{  old('sap') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" placeholder="sap">
        <p class="text-red-500 text-xs italic">{{ $errors->first('sap') }}</p>
       
      </div>
      
    </div>  <!-- fin  2 Campos -->
    <!--  grupo 3 -->
    <div class="flex flex-wrap -mx-3 mb-4">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="grid-state">
         Nombre PC
        </label>
        <input name="nompc" value="{{  old('nompc') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nompc" type="text" placeholder="Nombre Pc">
        <p class="text-red-500 text-xs italic">{{ $errors->first('nompc') }}</p>
      </div><!-- fin  Nombre PC -->
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"><!-- Ip del equipo -->
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="grid-state">
         Ip PC
        </label>
        <input name="ip" value="{{  old('ip') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nompc" type="text" placeholder="Ip Equipo">
        <p class="text-red-500 text-xs italic">{{ $errors->first('ip') }}</p>
      </div><!-- fin  ip del equipo -->
    </div><!-- fin  grupo 3 -->

    <div class="flex flex-wrap -mx-3 mb-6"><!--  Foto -->
      <div class="w-full  px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="grid-state">
         Foto
        </label>
        <input type="file" name="namefoto" accept="image/*" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="descripcion"  >
        <p class="text-red-500 text-xs italic">{{ $errors->first('namefoto') }}</p>
      </div><!-- fin  Foto -->
    </div><!-- fin Foto -->

    <div class="md:flex md:items-center">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
         Grabar
        </button>
       </div>
    </div>

  </form>
@endsection