<div class="w-full">
    <div class="flex flex-wrap justify-between items-center mb-5">
        <input type="hidden" wire:model="selected_id">
        <div class="w-auto pr-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Nombre</label>
            <input class="w-64 block bg-gray-800 text-sm border {{ $errors->has('nombremarca') ? ' border-red-500' : 'border-gray-200' }} rounded  px-4  py-1 leading-tight focus:outline-none focus:shadow-outline" id="nombremarca" wire:model="nombremarca" type="text" placeholder="Nombre Marca...">
            @error('nombremarca')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto pl-3 ">
            <button wire:click="update()" class="w-8 h-8 pt-3  bg-gray-900 text-gray-600 hover:text-green-300 rounded" title="Actualizar"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 13l4 4L19 7"/></svg></button>
        </div>
    </div>
</div>