<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function(Blueprint $table){
            $table->id();

            $table->string('codigo');
            $table->string('primer nombre'); 
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo');
            $table->string('nombre_encargado');
            $table->string('apellido_encargado');
            $table->date('fecha_nacimiento'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};