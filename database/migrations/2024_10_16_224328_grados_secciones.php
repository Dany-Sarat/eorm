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
            $table->timestamps();
        });
        Schema::create('secciones', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            //$table->foreignId('docente_id')->references('docentes');
            $table->foreignId('docente_id')->constrained('users');
            //$table->foreignId('grado_id')->references('grados');
            //$table->foreignId('docente_id')->constrained('docentes');
            $table->foreignId('grado_id')->constrained('grados');
        });
        Schema::create('asistencias', function(Blueprint $table){
            $table->id();
            $table->longText('descripcion');  
            $table->dateTime('fecha_toma_asistencia');
            $table->timestamps();

            //$table->foreignId('seccion_id')->references('secciones');
            $table->foreignId('seccion_id')->constrained('secciones');

        });
        Schema::create('alumnos_asistencias', function(Blueprint $table){
            $table->id();
            $table->timestamps(); 
            
            //$table->foreignId('alumno_id')->references('alumnos');
            //$table->foreignId('asistencia_id')->references('asistencias');
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