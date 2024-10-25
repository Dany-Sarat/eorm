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
        Schema::create('grados', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('anio_asignacion')->nullable();
            $table->timestamps();
        });

        Schema::create('secciones', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();

            $table->foreignId('docente_id')->constrained('users');
            $table->foreignId('grado_id')->constrained('grados');
        });

        Schema::create('asistencias', function(Blueprint $table){
            $table->id();
            $table->enum('unidad', [1,2,3,4]); 
            $table->dateTime('fecha_toma_asistencia');
            $table->timestamps();

            $table->foreignId('seccion_id')->constrained('secciones');
        });


        Schema::create('asistencia_detalles', function(Blueprint $table) {
            $table->id();
            $table->boolean('estado');

            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->foreignId('asistencia_id')->constrained('asistencias');
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
