<div class="w-full">
    <div class="flex flex-wrap justify-between items-center mb-5">
        <div class="w-auto pr-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombremodelo">Nombre</label>
            
            <input class="w-64 block bg-gray-800 text-sm border {{ $errors->has('nombretipo') ? ' border-red-500' : 'border-gray-200' }} rounded  px-4  py-1 leading-tight focus:outline-none focus:shadow-outline" id="nombretipo" wire:model="nombretipo" type="text" placeholder="Nombre Tipo...">
            @error('nombretipo')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto pl-3 ">
            <div class="pt-5">
                <button wire:click="store()" class=" w-8 h-8 pt-3  bg-gray-900 text-gray-600 hover:text-green-300 rounded" title="Agregar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></button>
            </div>
        </div>
    </div>
</div>