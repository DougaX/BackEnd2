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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = Sala::all();
        return SalaResource::collection($salas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaRequest $request): JsonResponse
    {
        $sala = Sala::create($request->validated());
        
        return response()->json([
            'message' => 'Sala criada com sucesso!',
            'data' => new SalaResource($sala)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sala $sala)
    {
        return new SalaResource($sala);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaRequest $request, Sala $sala): JsonResponse
    {
        $sala->update($request->validated());
        
        return response()->json([
            'message' => 'Sala atualizada com sucesso!',
            'data' => new SalaResource($sala)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sala $sala): JsonResponse
    {
        $sala->delete();
        
        return response()->json([
            'message' => 'Sala deletada com sucesso!'
        ], 200);
    }
}