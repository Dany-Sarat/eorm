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
        Schema::create('cursos', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();

        });

        Schema::create('curso_grado', function(Blueprint $table){
            $table->id();
            $table->timestamps();

            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('grado_id')->constrained('grados');
        });

        Schema::create('notas', function(Blueprint $table){
            $table->id();
            $table->decimal('promedio', 4, 2);

            $table->timestamps();

            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->foreignId('seccion_id')->constrained('secciones'); 
        });

        Schema::create('notas_detalle', function(Blueprint $table){
            $table->id();
            $table->decimal('tareas_primera_unidad', 0.00)->nullable();
            $table->decimal('tareas_segunda_uniad', 0.00)->nullable();
            $table->decimal('tareas_tercera_unidad', 0.00)->nullable();
            $table->decimal('tareas_cuarta_unidad', 0.00)->nullable();
            $table->decimal('examen_primera_unidad', 0.00)->nullable();
            $table->decimal('examen_segunda_unidad', 0.00)->nullable();
            $table->decimal('examen_tercera_unidad', 0.00)->nullable();
            $table->decimal('examen_cuarta_unidad', 0.00)->nullable();
            $table->decimal('asistencia_primera_unidad', 0.00)->nullable();
            $table->decimal('asistencia_segunda_unidad')->nullable();
            $table->decimal('asistencia_tercera_unidad')->nullable();
            $table->decimal('asistencia_cuarta_unidad', 0.00)->nullable();
            $table->decimal('total_primera_unidad', 0.00)->nullable();
            $table->decimal('total_segunda_unidad', 0.00)->nullable();
            $table->decimal('total_tercera_unidad', 0.00)->nullable();
            $table->decimal('total_cuarta_unidad', 0.00)->nullable();
            $table->decimal('promedio_total', 0.00)->nullable();

            $table->timestamps();

            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('nota_id')->constrained('notas');
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
