<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoequipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombretipo');
            $table->timestamps();
        });

        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombremodelo');
            $table->timestamps();
        });

        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->string('nombremarca');
            $table->timestamps();
        });

        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('serial')->unique();
            $table->string('namefoto');
            $table->date('fe_adquisicion');
            $table->boolean('debaja')->default($value = false);
            $table->string('sap')->nullable();
            $table->string('nompc')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('tipoequipo_id')->constrained();
            $table->foreignId('modelo_id')->constrained();
            $table->foreignId('marca_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('tipoequipos');
        Schema::dropIfExists('modelos');
        Schema::dropIfExists('marcas');
    }
}
