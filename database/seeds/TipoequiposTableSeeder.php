<?php

use Illuminate\Database\Seeder;

class TipoequiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tipoequipo::create([

            'nombretipo' => ucwords('Pc Escritorio'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Impresora'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Scanner'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Portatil'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Terminal Videoconferencia'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Videobean'),
        ]);

        App\Tipoequipo::create([

            'nombretipo' => ucwords('Ups'),
        ]);

        
    }
}
