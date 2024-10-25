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
            $table->string('nombre'); 
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo')->nullable();
            $table->string('nombre_encargado');
            $table->string('apellido_encargado');
            $table->boolean('estado_aprobacion',)->nullable();
            $table->string('grado_actual')->nullable();
            $table->date('fecha_nacimiento'); 
            $table->timestamps();

            $table->foreignId('grado_id')->nullable()->constrained('grados');
            $table->foreignId('seccion_id')->nullable()->constrained('secciones');
            
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