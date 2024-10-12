<?php
use App\Http\Controllers\AlumnosController;
use \Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {
  Route::get('', [AlumnosController::class, 'index'])
    ->name('alumnos.index');
  Route::get('crear', [AlumnosController::class, 'crear'])
    ->name('alumnos.crear');
  Route::post('guardar', [AlumnosController::class, 'guardar'])
    ->name('alumnos.guardar');
  Route::get('editar/{id}', [AlumnosController::class, 'editar'])
    ->name('alumnos.editar');
  Route::put('actualizar/{id}', [AlumnosController::class, 'actualizar'])
    ->name('alumnos.actualizar');
});