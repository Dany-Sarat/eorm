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

            $table->foreignId('grado_id')->references('grados');
            $table->foreignId('grado_id')->constrained('grados');
        });

        Schema::create('curso_grado', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('grado_id')->constrained('grados');
        });
        
        Schema::create('notas', function(Blueprint $table){
            $table->id();
            $table->decimal('nota', 4, 2); 
            $table->timestamps();


            $table->foreignId('curso_id')->references('cursos');
            $table->foreignId('alumno_id')->references('alumnos');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('alumno_id')->constrained('alumnos');
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