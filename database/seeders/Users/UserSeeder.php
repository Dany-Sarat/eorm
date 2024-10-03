<?php
namespace Database\Seeders\Users;
use App\Models\InfoDocente;
use App\Models\InfoUsuario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // director de ejemplo
        $director = new User();
        $director->email = 'dire@example.test';
        $director->password = Hash::make('admin1234');
        $director->rol = 'DIRECTOR';
        $director->save();
        $infoUsuario = new InfoUsuario();
        $infoUsuario->nombres = 'Juan';
        $infoUsuario->apellidos = 'Hernandez';
        $infoUsuario->fecha_nacimiento = \Carbon\Carbon::create(1990, 1, 1);
        $infoUsuario->user_id = $director->id;
        $infoUsuario->save();
        $infoDocente = new InfoDocente();
        $infoDocente->formacion_academica = 'UNIVERSIDAD';
        $infoDocente->inicio_laboral = \Carbon\Carbon::create(2020, 1, 1);
        $infoDocente->tipo_contrato = 'PRESUPUESTADO';
        $infoDocente->user_id = $director->id;
        $infoDocente->save();
        // info docente
        $docente = new User();
        $docente->email = 'docente@example.test';
        $docente->password = Hash::make('admin1234');
        $docente->rol = 'DOCENTE';
        $docente->save();
        $infoUsuarioDocente = new InfoUsuario();
        $infoUsuarioDocente->nombres = 'Maria';
        $infoUsuarioDocente->apellidos = 'Gonzalez';
        $infoUsuarioDocente->fecha_nacimiento = \Carbon\Carbon::create(1990, 1, 1);
        $infoUsuarioDocente->user_id = $docente->id;
        $infoUsuarioDocente->save();
        $infoDocenteD = new InfoDocente();
        $infoDocenteD->formacion_academica = 'DIVERSIFICADO';
        $infoDocenteD->inicio_laboral = \Carbon\Carbon::create(2020, 1, 1);
        $infoDocenteD->tipo_contrato = 'CONTRATO';
        $infoDocenteD->user_id = $docente->id;
        $infoDocenteD->save();
    }
}