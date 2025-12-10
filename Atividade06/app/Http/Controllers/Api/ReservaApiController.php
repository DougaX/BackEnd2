<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReservaApiController extends Controller
{
    public function index(): JsonResponse
    {
        $reservas = Reserva::with(['user', 'sala'])->get();
        return response()->json($reservas);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'data_inicio' => 'required|date|after:now',
            'data_fim' => 'required|date|after:data_inicio',
            'finalidade' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pendente';

        $reserva = Reserva::create($validated);
        $reserva->load(['user', 'sala']);

        return response()->json($reserva, 201);
    }

    public function show(string $id): JsonResponse
    {
        $reserva = Reserva::with(['user', 'sala'])->findOrFail($id);
        return response()->json($reserva);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $reserva = Reserva::findOrFail($id);

        $validated = $request->validate([
            'sala_id' => 'sometimes|exists:salas,id',
            'data_inicio' => 'sometimes|date|after:now',
            'data_fim' => 'sometimes|date|after:data_inicio',
            'finalidade' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:pendente,aprovada,rejeitada',
            'observacoes' => 'nullable|string',
        ]);

        $reserva->update($validated);
        $reserva->load(['user', 'sala']);

        return response()->json($reserva);
    }

    public function destroy(string $id): JsonResponse
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(['message' => 'Reserva deletada com sucesso']);
    }
}