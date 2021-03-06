<div>
   
    @if($agrega)
     
       <form wire:submit.prevent="masfotos">
          <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-1" for="grid-state">
             Foto
          </label>
          <input type="file" wire:model="photo" accept="image/*" class="appearance-none block  bg-gray-200  text-gray-700 border border-gray-200 rounded py-2 px-2 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="descripcion"  >
          <p class="text-red-500 text-xs italic">{{ $errors->first('photo') }}</p>
                    
          <button type="submit" class="flex item-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-2 hover:bg-orange-600 transition ease-in-out duration-150" title="Grabar Foto">
            Enviar
          </button>
       </form>
      
    @else
        <button wire:click="$set('agrega', true)" class="flex my-2 bg-gray-900 text-gray-300 font-semibold   hover:text-orange-600 focus:border-gray-900 " title="Agrerar Fotos">
            Agregar Fotos
        </button> 
    @endif
        <!-- movie-images -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 " x-data="{ isOpen: false, image: ''}">
        @foreach ($data as $item)
            <div >
                <a
                    @click.prevent="
                        isOpen = true
                        image='{{ asset('storage/photos/'.$item->namefoton) }}'
                    "
                    href="#"
                >
                    <img src="{{asset('storage/photos/'.$item->namefoton)}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150" width="200" height="300"  > 
                  
                </a>
                   
                <div class="flex items-center text-gray-400 text-sm"> 
                    <span class="mx-1"><button wire:click="remove({{ $item->id }})" onclick="confirm('Confirma Eliminarlo?') || event.stopImmediatePropagation()"  class="bg-gray-900 hover:text-red-300 w-8 h-8 text-gray-600 " title="Eliminar" >Eliminar</button></span>
                    
                </div>
          </div>
        @endforeach

        <div
            style="background-color: rgba(0, 0, 0, .5);"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show="isOpen"
        >
            <div class="container mx-auto lg:px-32  rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="text-3xl leading-none hover:text-gray-300 ">&times;
                        </button>
                    </div>
                    <div class="modal-body px-8 py-8 ">
                        <img :src="image" alt="poster" class=" mx-auto w-1/3 ">
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- end movie-images -->

</div>


