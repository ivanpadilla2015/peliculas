<?php

namespace App\Http\Livewire;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Equipo;

class SearchDropdow extends Component
{
    public $busqueda = '';

    public function render()
    {   
        $busquedaResuls = [];
       
        //$busquedaResuls = Equipo::where('marca','LIKE',"%$this->busqueda%")->get();
        // Retrieve posts with at least ten comments containing words like foo%...
        // $users = Equipo::with(['modelo', 'tipoequipo'])->get();      
        //dump($cont);                  
        if(strlen($this->busqueda) >= 2){
            $busquedaResuls = DB::table('equipos')
            ->Join('users', 'users.id', '=', 'equipos.user_id')
            ->Join('modelos', 'modelos.id', '=', 'equipos.modelo_id')
            ->Join('tipoequipos', 'tipoequipos.id', '=', 'equipos.tipoequipo_id')
            ->Join('marcas', 'marcas.id', '=', 'equipos.marca_id')
            ->where('marcas.nombremarca', 'like', "%$this->busqueda%")
            ->OrWhere('users.name', 'like', "%$this->busqueda%")
            ->OrWhere('modelos.nombremodelo', 'like', "%$this->busqueda%")
            ->Orwhere('tipoequipos.nombretipo', 'like', "%$this->busqueda%")
            ->select('equipos.id as usuario_id', 'equipos.namefoto', 'users.name', 'modelos.*', 'tipoequipos.*', 'marcas.*')
            ->get();
           
        }
            
      return view('livewire.search-dropdow',['busquedaResuls' => collect($busquedaResuls)->take(7)]);
    }
}
