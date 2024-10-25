<?php

use App\Http\Controllers\MisSeccionesController;
use App\Http\Controllers\SeccionCursoController;
use Illuminate\Support\Facades\Route;

Route::get('', [MisSeccionesController::class, 'index'])
  ->middleware(['auth'])
  ->name('mis_secciones.index');

Route::get('/mi-seccion/{seccion}', [MisSeccionesController::class, 'ver'])
  ->middleware(['auth'])
  ->name('mis_secciones.ver');

Route::get('/mi-seccion/{seccion}/unidad/{id}', [MisSeccionesController::class, 'unidad'])
  ->middleware(['auth'])
  ->name('mis_secciones.unidad');

Route::post('/mi-seccion/{seccion}/registrarAsistencia', [MisSeccionesController::class, 'registrarAsistencia'])
  ->middleware(['auth'])
  ->name('mis_secciones.registrar_asistencia');

Route::get('/mi-seccion/{seccion}/detalle-asistencia/{id}', [MisSeccionesController::class, 'detalleAsistencia'])

->middleware(['auth'])
->name('mis_secciones.asistencia.detalle');
// cursos administracion
Route::get('/mi-seccion/{seccion}/unidad/{id}/cursos', [SeccionCursoController::class, 'index'])
->middleware(['auth'])
->name('mis_secciones.cursos.index');
Route::get('/mi-seccion/{seccion}/unidad/{id}/cursos/{alumno}', [SeccionCursoController::class, 'ver'])
->middleware(['auth'])
->name('mis_secciones.cursos.ver');
Route::post('/mi-seccion/cursos/{alumno}/unidad/{id}', [SeccionCursoController::class, 'actualizarNotas'])
->middleware(['auth'])
->name('mis_secciones.cursos.actualizar');