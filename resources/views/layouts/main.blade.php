<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movie App</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @yield('style')
    <livewire:styles>
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>  
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="/equipos">
                        <img  class="rounded-md border md:w-20 md:h-16 sm:w-12"
                         src="/images/ima1.png" alt="Logo Alfm">  
                         
                     </a>
                </li>
                
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="/equipos" class="hover:text-gray-300 ">Principal</a>
                </li>

                <li>
                    <div class="dropdown inline-block relative">
                        <button class=" py-2 px-4 rounded inline-flex items-center">
                          <span class="mr-1">Manejo Equipos</span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                          <li class=""><a  class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/equipos/create">Equipos</a></li>
                          <li class=""><a  class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/tipos">Tipos Equipos</a></li>
                          <li class=""><a  class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/modelos">Modelos Equipos</a></li>
                          <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/marcas">Marcas Equipo</a></li>
                        </ul>
                    </div>
                </li>
              
                <li>
                    <div class="dropdown inline-block relative">
                        <button class=" py-2 px-1 rounded inline-flex items-center">
                          <span class="mr-1">Reportes</span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                          <li class=""><a  class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/pdfg">General</a></li>
                          <li class=""><a  class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Equipo(s) x Usuario</a></li>
                          <li class=""><a  class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Equipo(s) x Dependencia</a></li>
                          <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Three is the magic number</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown inline-block relative">
                        <button class=" py-2 px-1 rounded inline-flex items-center">
                          <span class="mr-1">Personal</span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                          <li class=""><a  class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/personal">Listado personal </a></li>
                          <li class=""><a  class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/personal/create">Crear Personal</a></li>
                          <li class=""><a  class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/dependen">Manejo Dependencias</a></li>
                          
                        </ul>
                    </div>
                </li>
              
                
            </ul>
            
            <div class="flex flex-col md:flex-row item-center">
                <livewire:search-dropdow>
            </div>
        </div>
    </nav>
    
    
    
    @yield('content')
    
    <livewire:scripts>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script> 
    <script src="{{asset('js/toastr.min.js')}}"></script> 
    @toastr_render 
    @yield('script')
    
  
   </body>
</html>