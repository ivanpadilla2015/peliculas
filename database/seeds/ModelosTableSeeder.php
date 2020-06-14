<?php

use Illuminate\Database\Seeder;

class ModelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Modelo::create([

            'nombremodelo' => strtoupper('HP 5800'),
        ]);
        App\Modelo::create([

            'nombremodelo' => strtoupper('HP 6000 pro'),
        ]);
        App\Modelo::create([

            'nombremodelo' => strtoupper('HP 6005 pro'),
        ]);
        App\Modelo::create([

            'nombremodelo' => strtoupper('ThinkCentre E73z'),
        ]);
        App\Modelo::create([

            'nombremodelo' => strtoupper('ProOne 600 G1'),
        ]);
        App\Modelo::create([

            'nombremodelo' => strtoupper('ProOne 400 G2'),
        ]);

        App\Modelo::create([

            'nombremodelo' => strtoupper('Ups Titan'),
        ]);
    }
}
