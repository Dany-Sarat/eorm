<?php
namespace Database\Seeders\Cursos;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CursoSeeder extends Seeder
{
    private const lista = [
        'Matemáticas',
        'Ciencias Naturales',
        'Lenguaje L1',
        'Ciencias Sociales',
        'Educación Física',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(self::lista as $cursoNombre) {
            $curso = new Curso();
            $curso->nombre = $cursoNombre;
            $curso->save();
        }
    }
}