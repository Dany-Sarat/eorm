<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradoController;
Route::get('', [GradoController::class, 'index'])
  ->middleware(['auth'])
  ->name('grados.index');
Route::get('/crear', [GradoController::class, 'crear'])
  ->middleware(['auth'])
  ->name('grados.crear');
Route::post('/guardar', [GradoController::class, 'guardar'])
  ->middleware(['auth'])
  ->name('grados.guardar');
Route::get('/editar/{id}', [GradoController::class, 'editar'])
  ->middleware(['auth'])
  ->name('grados.editar');