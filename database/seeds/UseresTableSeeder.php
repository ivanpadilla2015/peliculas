<?php

use Illuminate\Database\Seeder;

class UseresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'     => 'Ivan Padilla Molinares',
            'email'    => 'ivanpadillamol@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('nilson123'),
            'remember_token' => Str::random(10),
            'dependencia_id'  => 1
        ]);

        factory(App\User::class, 29)->create();
    }
}
