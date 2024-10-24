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
            $table->string('correo');
            $table->string('nombre_encargado');
            $table->string('apellido_encargado');
            $table->decimal('promedio', 4, 2)->nullable();
            $table->boolean('estado_aprobacion',)->nullable();
            $table->date('fecha_nacimiento'); 
            $table->timestamps();

            //$table->foreignId('grado_id')->references('grados');
            //$table->foreignId('seccion_id')->references('secciones');

            $table->foreignId('grado_id')->nullable()->constrained('grados');
            $table->foreignId('seccion_id')->nullable()->constrained('secciones');
            
        });
        Schema::create('asistencia', function(Blueprint $table){
            $table->id();
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