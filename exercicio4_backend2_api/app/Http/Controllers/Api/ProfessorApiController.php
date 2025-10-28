<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Resources\ProfessorResource;
use Illuminate\Http\JsonResponse;

class ProfessorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores = Professor::all();
        return ProfessorResource::collection($professores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorRequest $request): JsonResponse
    {
        $professor = Professor::create($request->validated());
        
        return response()->json([
            'message' => 'Professor criado com sucesso!',
            'data' => new ProfessorResource($professor)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
    $professor = Professor::findOrFail($id);
    return new ProfessorResource($professor);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorRequest $request, $id): JsonResponse
{
    $professor = Professor::findOrFail($id);
    $professor->update($request->validated());
    
    return response()->json([
        'message' => 'Professor atualizado com sucesso!',
        'data' => new ProfessorResource($professor)
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor): JsonResponse
    {
        $professor->delete();
        
        return response()->json([
            'message' => 'Professor deletado com sucesso!'
        ], 200);
    }
}