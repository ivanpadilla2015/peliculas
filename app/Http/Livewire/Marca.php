<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Marca as Marcas;
use Livewire\WithPagination;

class Marca extends Component
{
    use WithPagination;
    public $nombremarca, $selected_id;
    public $updateMode = false;

    public function render()
    {
        
        return view('livewire.marca', [ 'data' => Marcas::orderBy('id', 'desc')->paginate(5)]);
    }

    private function resetInput()
    {
        $this->nombremarca = null;
        
    }

    public function store()
    {
        $this->validate([
            'nombremarca' => 'required|min:5',
        ]);       
        Marcas::create([
            'nombremarca' => strtoupper($this->nombremarca)
        ]);        
        $this->emit('alert', ['type'=> 'success', 'message' => 'Creado Correctamente']);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Marcas::findOrFail($id);  
        $this->selected_id = $id;
        $this->nombremarca = $record->nombremarca;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'nombremarca' => 'required|min:5'
            
        ]); 
         if ($this->selected_id) {
            $record = Marcas::find($this->selected_id);
            $record->update(['nombremarca' => strtoupper($this->nombremarca)]);   
            $this->emit('alert', ['type'=> 'success', 'message' => 'Actualizado Correctamente']);    
            $this->resetInput();
            $this->updateMode = false;
           
        }   
     }

     public function destroy($id)
    {
        if ($id) {
            $record = Marcas::where('id', $id);
            $record->delete();
            $this->emit('alert', ['type'=> 'success', 'message' => 'Eliminado Correctamente']);
            
        }
     }
}
