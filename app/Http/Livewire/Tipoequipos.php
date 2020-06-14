<?php

namespace App\Http\Livewire;
use App\Tipoequipo;
use Livewire\Component;
use Livewire\WithPagination;

class Tipoequipos extends Component
{
    use WithPagination;
    public $nombretipo, $selected_id;
    public $updateMode = false;
    public function render()
    {
        return view('livewire.tipoequipos', [ 'data' => Tipoequipo::orderBy('id', 'desc')->paginate(5)]);
    }

    private function resetInput()
    {
        $this->nombretipo = null;
        
    }

    public function store()
    {
        $this->validate([
            'nombretipo' => 'required|min:5',
        ]);       
        Tipoequipo::create([
            'nombretipo' => ucwords($this->nombretipo)
        ]);        
        $this->emit('alert', ['type'=> 'success', 'message' => 'Creado Correctamente']);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Tipoequipo::findOrFail($id);  
        $this->selected_id = $id;
        $this->nombretipo = $record->nombretipo;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'nombretipo' => 'required|min:5'
            
        ]); 
         if ($this->selected_id) {
            $record = Tipoequipo::find($this->selected_id);
            $record->update(['nombretipo' => strtoupper($this->nombretipo)]);   
            $this->emit('alert', ['type'=> 'success', 'message' => 'Actualizado Correctamente']);    
            $this->resetInput();
            $this->updateMode = false;
           
        }   
     }

     public function destroy($id)
    {
        if ($id) {
            $record = Tipoequipo::where('id', $id);
            $record->delete();
            $this->emit('alert', ['type'=> 'success', 'message' => 'Eliminado Correctamente']);
            
        }
     }
}
