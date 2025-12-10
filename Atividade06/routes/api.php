<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProfessorApiController;
use App\Http\Controllers\Api\AdministradorApiController;
use App\Http\Controllers\Api\SalaApiController;
use App\Http\Controllers\Api\ReservaApiController;
use App\Http\Controllers\Api\FileUploadController;

// ============================================
// ROTAS PÚBLICAS (sem autenticação)
// ============================================

// Autenticação - Login (público)
Route::post('/login', [AuthController::class, 'login']);

// Rotas GET públicas - Listar e visualizar
Route::get('/professores', [ProfessorApiController::class, 'index']);
Route::get('/professores/{id}', [ProfessorApiController::class, 'show']);

Route::get('/administradores', [AdministradorApiController::class, 'index']);
Route::get('/administradores/{id}', [AdministradorApiController::class, 'show']);

Route::get('/salas', [SalaApiController::class, 'index']);
Route::get('/salas/{id}', [SalaApiController::class, 'show']);

Route::get('/reservas', [ReservaApiController::class, 'index']);
Route::get('/reservas/{id}', [ReservaApiController::class, 'show']);

// ============================================
// ROTAS PROTEGIDAS (requer autenticação)
// ============================================

Route::middleware('auth:sanctum')->group(function () {
    
    // Rotas de autenticação autenticadas
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);
    Route::get('/me', [AuthController::class, 'me']);

    // ============================================
    // ROTAS DE USUÁRIOS
    // Usuários podem gerenciar apenas seus próprios dados
    // Admin pode gerenciar todos
    // ============================================
    Route::apiResource('users', UserApiController::class);

    // ============================================
    // ROTAS DE RESERVAS
    // Usuários podem criar e gerenciar suas próprias reservas
    // ============================================
    Route::post('/reservas', [ReservaApiController::class, 'store']);
    Route::put('/reservas/{id}', [ReservaApiController::class, 'update']);
    Route::delete('/reservas/{id}', [ReservaApiController::class, 'destroy']);

    // ============================================
    // ROTAS DE UPLOAD DE ARQUIVOS (BÔNUS)
    // ============================================
    Route::post('/upload', [FileUploadController::class, 'upload']);
    Route::delete('/upload', [FileUploadController::class, 'delete']);

    // ============================================
    // ROTAS DE SALAS
    // Professores e Admins têm acesso total
    // ============================================
    Route::middleware('can:manage-salas')->group(function () {
        Route::post('/salas', [SalaApiController::class, 'store']);
        Route::put('/salas/{id}', [SalaApiController::class, 'update']);
        Route::delete('/salas/{id}', [SalaApiController::class, 'destroy']);
    });

    // ============================================
    // ROTAS DE PROFESSORES E ADMINISTRADORES
    // Apenas ADMIN tem acesso total
    // ============================================
    Route::middleware('can:admin-only')->group(function () {
        // Professores
        Route::post('/professores', [ProfessorApiController::class, 'store']);
        Route::put('/professores/{id}', [ProfessorApiController::class, 'update']);
        Route::delete('/professores/{id}', [ProfessorApiController::class, 'destroy']);

        // Administradores
        Route::post('/administradores', [AdministradorApiController::class, 'store']);
        Route::put('/administradores/{id}', [AdministradorApiController::class, 'update']);
        Route::delete('/administradores/{id}', [AdministradorApiController::class, 'destroy']);
    });
});