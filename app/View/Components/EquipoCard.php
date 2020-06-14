<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EquipoCard extends Component
{
  
   public $equipo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($equipo)
    {
       
        $this->equipo = $equipo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.equipo-card');
    }
}
