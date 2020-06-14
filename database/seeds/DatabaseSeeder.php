<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DependenciasTableSeeder::class);
        $this->call(UseresTableSeeder::class);
        $this->call(TipoequiposTableSeeder::class);
        $this->call(ModelosTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
    
    }
}
