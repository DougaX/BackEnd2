<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfessorApiController;
use App\Http\Controllers\Api\AdministradorApiController;
use App\Http\Controllers\Api\SalaApiController;

// Professores
Route::get('professores', [ProfessorApiController::class, 'index']);
Route::post('professores', [ProfessorApiController::class, 'store']);
Route::get('professores/{id}', [ProfessorApiController::class, 'show']);
Route::put('professores/{id}', [ProfessorApiController::class, 'update']);
Route::delete('professores/{id}', [ProfessorApiController::class, 'destroy']);

// Administradores
Route::get('administradores', [AdministradorApiController::class, 'index']);
Route::post('administradores', [AdministradorApiController::class, 'store']);
Route::get('administradores/{id}', [AdministradorApiController::class, 'show']);
Route::put('administradores/{id}', [AdministradorApiController::class, 'update']);
Route::delete('administradores/{id}', [AdministradorApiController::class, 'destroy']);

// Salas
Route::get('salas', [SalaApiController::class, 'index']);
Route::post('salas', [SalaApiController::class, 'store']);
Route::get('salas/{id}', [SalaApiController::class, 'show']);
Route::put('salas/{id}', [SalaApiController::class, 'update']);
Route::delete('salas/{id}', [SalaApiController::class, 'destroy']);