<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfessorApiController;
use App\Http\Controllers\Api\AdministradorApiController;
use App\Http\Controllers\Api\SalaApiController;

// Rotas API para Professores
Route::apiResource('professores', ProfessorApiController::class);

// Rotas API para Administradores
Route::apiResource('administradores', AdministradorApiController::class);

// Rotas API para Salas
Route::apiResource('salas', SalaApiController::class);