<?php

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\SalaController;

// Rotas CRUD Completo para Professores
Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/create', [ProfessorController::class, 'create'])->name('professores.create');
Route::post('/professores', [ProfessorController::class, 'store'])->name('professores.store');
Route::get('/professores/{id}', [ProfessorController::class, 'show'])->name('professores.show');
Route::get('/professores/{id}/edit', [ProfessorController::class, 'edit'])->name('professores.edit');
Route::put('/professores/{id}', [ProfessorController::class, 'update'])->name('professores.update');
Route::delete('/professores/{id}', [ProfessorController::class, 'destroy'])->name('professores.destroy');

// Rotas CRUD Completo para Administradores
Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
Route::get('/administradores/create', [AdministradorController::class, 'create'])->name('administradores.create');
Route::post('/administradores', [AdministradorController::class, 'store'])->name('administradores.store');
Route::get('/administradores/{id}', [AdministradorController::class, 'show'])->name('administradores.show');
Route::get('/administradores/{id}/edit', [AdministradorController::class, 'edit'])->name('administradores.edit');
Route::put('/administradores/{id}', [AdministradorController::class, 'update'])->name('administradores.update');
Route::delete('/administradores/{id}', [AdministradorController::class, 'destroy'])->name('administradores.destroy');

// Rotas CRUD Completo para Salas
Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
Route::get('/salas/create', [SalaController::class, 'create'])->name('salas.create');
Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
Route::get('/salas/{id}', [SalaController::class, 'show'])->name('salas.show');
Route::get('/salas/{id}/edit', [SalaController::class, 'edit'])->name('salas.edit');
Route::put('/salas/{id}', [SalaController::class, 'update'])->name('salas.update');
Route::delete('/salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');