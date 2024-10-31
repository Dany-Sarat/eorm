<?php

use App\Http\Controllers\ProfileController;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Nota;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $docentes = User::count();
    $alumnos = Alumno::count();
    $todasLasNotas = Nota::orderBy('promedio', 'desc')->first();
    
    $mejorNota = 'NO DISPONIBLE';
    
    if ($todasLasNotas?->alumno?->nombre != null) {
        $mejorNota = $todasLasNotas->alumno->nombre . ' ' . $todasLasNotas->alumno->apellido;
    }


    $secciones = Seccion::whereHas('grado', function ($query) {
        return $query->where('anio_asignacion', now()->format('Y'));
    })->get();
    $mejorPorSeccion = [];
    foreach ($secciones as $seccion) {
        $nota = Nota::where('seccion_id', $seccion->id)
            ->orderBy('promedio', 'desc')->first();
        $mejorPorSeccion[] = [
            'nombre_alumno' => ($nota?->alumno != null) ? "{$nota->alumno->nombre} {$nota->alumno->apellido}" : 'NO DISPONIBLE',
            'seccion' => $seccion->grado->nombre . ' ' . $seccion->nombre,
        ];
    }
    $totalSecciones = $secciones->count();
    $totalGrados = Grado::where('anio_asignacion', now()->format('Y'))->count();
    return view('dashboard', compact('docentes', 'alumnos', 'mejorNota', 'mejorPorSeccion', 'totalSecciones', 'totalGrados'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';