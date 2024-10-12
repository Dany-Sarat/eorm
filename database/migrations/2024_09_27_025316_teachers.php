<?php

use App\Common\Formacion;
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
        //

        Schema::create('info_usuarios', function(Blueprint $table){
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->datetime('fecha_nacimiento');
            $table->timestamps();

            $table->foreignId('user_id')->unique()->constrained('users');
        });

        Schema::create('info_docentes', function(Blueprint $table){
            $table->id();
            $table->enum('formacion_academica', array_column(Formacion::cases(), 'name'));
            $table->date('inicio_laboral');
            $table->enum('tipo_contrato', ['CONTRATO', 'PRESUPUESTADO']);
            $table->timestamps();

            $table->foreignId('user_id')->unique()->constrained('users');
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
