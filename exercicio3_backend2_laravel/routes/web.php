<?php

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\SalaController;

Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/{id}', [ProfessorController::class, 'show'])->name('professores.show');

Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
Route::get('/administradores/{id}', [AdministradorController::class, 'show'])->name('administradores.show');

Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
Route::get('/salas/{id}', [SalaController::class, 'show'])->name('salas.show');
