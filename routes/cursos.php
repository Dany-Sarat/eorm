<?php
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

Route::get('', [CursoController::class, 'index'])
  ->middleware(['auth'])
  ->name('cursos.index');

Route::get('/crear', [CursoController::class, 'crear'])
  ->middleware(['auth'])
  ->name('cursos.crear');;

Route::post('/guardar', [CursoController::class, 'guardar'])
  ->middleware(['auth'])
  ->name('cursos.guardar');

Route::get('/editar/{id}', [CursoController::class, 'editar'])
  ->middleware(['auth'])
  ->name('cursos.editar');

Route::put('/actualizar/{id}', [CursoController::class, 'actualizar'])  
  ->middleware(['auth'])
  ->name('cursos.actualizar');
  
Route::delete('/eliminar/{curso}', [CursoController::class, 'eliminar'])
  ->middleware(['auth'])
  ->name('cursos.eliminar');