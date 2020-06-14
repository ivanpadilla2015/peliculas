<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;

class Agregarfoto extends Component
{
    use WithFileUploads;
    public $agrega = false;
    public $photo;

    public function render()
    {
        return view('livewire.agregarfoto');
    }

    public function masfotos()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

       $this->photo->store("photos", 'public');
       return  $this->photo; 
       $this->agrega = false;
    }

    


}
