<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Marca::create([

            'nombremarca' => strtoupper('Hp')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Hp Compaq')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Hp Laserjet')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Lenovo')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Epson')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Panasonic')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Ricoh')
        ]);
        App\Marca::create([

            'nombremarca' => strtoupper('Samsung')
        ]);


    }
}
