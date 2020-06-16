<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithFileUploads;
use App\Otrasfoto;

class Agregarfoto extends Component
{
    use WithFileUploads;
    public $agrega = false;
    public $photo, $serial, $ide;
    
    public function render()
    {
        $data = Otrasfoto::where('equipo_id', $this->ide)->orderBy('id', 'desc')->get();
        return view('livewire.agregarfoto', compact('data'));
    }

    public function mount($equipo)
    {
        $this->serial = $equipo->serial;
        $this->ide = $equipo->id;
        
    }

    public function masfotos()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
            
        $img   = ImageManagerStatic::make($this->photo)->resize(144, 144)->encode('jpg');
        $name  = $this->serial.'_'.Str::random(2) . '.jpg';
        Storage::disk('public')->put("photos/".$name, $img);
        Otrasfoto::create([
            'namefoton'           => $name,
            'equipo_id'           => $this->ide,
        ]);
        $this->emit('alert', ['type'=> 'success', 'message' => 'Agregada Correctamente']);  
        $this->agrega = false;
  
    }

    public function remove($Id)
    {
        $foto = Otrasfoto::find($Id);
        Storage::disk('public')->delete('photos/'.$foto->namefoton);
        $foto->delete();
        $this->emit('alert', ['type'=> 'success', 'message' => 'Borrada Correctamente 😊']);  
        
    }

    


}
