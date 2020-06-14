<?php

namespace App\Http\Livewire;
use App\Modelo;
use Livewire\Component;
use Livewire\WithPagination;


class Modelos extends Component
{
    public $nombremodelo, $selected_id;
    public $updateMode = false;
    use WithPagination;
   
    public function render()
    {
       
        return view('livewire.modelos', [ 'data' => Modelo::orderBy('id', 'desc')->paginate(5)]);
    }

    private function resetInput()
    {
        $this->nombremodelo = null;
        
    }

    public function store()
    {
        $this->validate([
            'nombremodelo' => 'required|min:5',
        ]);       
        Modelo::create([
            'nombremodelo' => strtoupper($this->nombremodelo)
        ]);        
        $this->emit('alert', ['type'=> 'success', 'message' => 'Creado Correctamente']);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Modelo::findOrFail($id);  
        $this->selected_id = $id;
        $this->nombremodelo = $record->nombremodelo;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'nombremodelo' => 'required|min:5'
            
        ]); 
         if ($this->selected_id) {
            $record = Modelo::find($this->selected_id);
            $record->update(['nombremodelo' => strtoupper($this->nombremodelo)]);   
            $this->emit('alert', ['type'=> 'success', 'message' => 'Actualizado Correctamente']);    
            $this->resetInput();
            $this->updateMode = false;
           
        }   
     }

    public function destroy($id)
    {
        if ($id) {
            $record = Modelo::where('id', $id);
            $record->delete();
            $this->emit('alert', ['type'=> 'success', 'message' => 'Eliminado Correctamente']);
            
        }
     }
}
