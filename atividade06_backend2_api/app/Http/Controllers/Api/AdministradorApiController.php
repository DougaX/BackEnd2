<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Http\Requests\StoreAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;
use App\Http\Resources\AdministradorResource;
use Illuminate\Http\JsonResponse;

class AdministradorApiController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all();
        return AdministradorResource::collection($administradores);
    }

    public function store(StoreAdministradorRequest $request): JsonResponse
    {
        $administrador = Administrador::create($request->validated());
        
        return response()->json([
            'message' => 'Administrador criado com sucesso!',
            'data' => new AdministradorResource($administrador)
        ], 201);
    }

    public function show($id)
    {
        $administrador = Administrador::findOrFail($id);
        return new AdministradorResource($administrador);
    }

    public function update(UpdateAdministradorRequest $request, $id): JsonResponse
    {
        $administrador = Administrador::findOrFail($id);
        
        $dados = $request->validated();
        
        // Remove senha do array se não foi fornecida
        if (empty($dados['senha'])) {
            unset($dados['senha']);
        }
        
        $administrador->update($dados);
        
        return response()->json([
            'message' => 'Administrador atualizado com sucesso!',
            'data' => new AdministradorResource($administrador)
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->delete();
        
        return response()->json([
            'message' => 'Administrador deletado com sucesso!'
        ], 200);
    }
}