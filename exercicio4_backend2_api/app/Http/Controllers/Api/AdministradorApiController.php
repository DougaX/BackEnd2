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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = Administrador::all();
        return AdministradorResource::collection($administradores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdministradorRequest $request): JsonResponse
    {
        $administrador = Administrador::create($request->validated());
        
        return response()->json([
            'message' => 'Administrador criado com sucesso!',
            'data' => new AdministradorResource($administrador)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        return new AdministradorResource($administrador);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdministradorRequest $request, Administrador $administrador): JsonResponse
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador): JsonResponse
    {
        $administrador->delete();
        
        return response()->json([
            'message' => 'Administrador deletado com sucesso!'
        ], 200);
    }
}