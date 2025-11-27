<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Http\Requests\StoreSalaRequest;
use App\Http\Requests\UpdateSalaRequest;
use App\Http\Resources\SalaResource;
use Illuminate\Http\JsonResponse;

class SalaApiController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return SalaResource::collection($salas);
    }

    public function store(StoreSalaRequest $request): JsonResponse
    {
        $sala = Sala::create($request->validated());
        
        return response()->json([
            'message' => 'Sala criada com sucesso!',
            'data' => new SalaResource($sala)
        ], 201);
    }

    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return new SalaResource($sala);
    }

    public function update(UpdateSalaRequest $request, $id): JsonResponse
    {
        $sala = Sala::findOrFail($id);
        $sala->update($request->validated());
        
        return response()->json([
            'message' => 'Sala atualizada com sucesso!',
            'data' => new SalaResource($sala)
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();
        
        return response()->json([
            'message' => 'Sala deletada com sucesso!'
        ], 200);
    }
}