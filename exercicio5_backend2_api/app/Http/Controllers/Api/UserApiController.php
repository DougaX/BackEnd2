<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserApiController extends Controller
{
    /**
     * Listar todos os usuários (apenas admin)
     */
    public function index(Request $request)
    {
        // Apenas admin pode listar todos os usuários
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'message' => 'Acesso negado. Apenas administradores podem listar usuários.'
            ], 403);
        }

        return response()->json(User::all());
    }

    /**
     * Exibir um usuário específico
     */
    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Usuário só pode ver seus próprios dados, exceto admin
        if (!$request->user()->isAdmin() && $request->user()->id != $id) {
            return response()->json([
                'message' => 'Acesso negado. Você só pode visualizar seus próprios dados.'
            ], 403);
        }

        return response()->json($user);
    }

    /**
     * Criar novo usuário
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'sometimes|in:admin,professor,user',
        ]);

        // Apenas admin pode definir role
        if (!$request->user()->isAdmin()) {
            $validated['role'] = 'user';
        }

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'user' => $user
        ], 201);
    }

    /**
     * Atualizar usuário
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Usuário só pode editar seus próprios dados, exceto admin
        if (!$request->user()->isAdmin() && $request->user()->id != $id) {
            return response()->json([
                'message' => 'Acesso negado. Você só pode editar seus próprios dados.'
            ], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|min:6',
            'role' => 'sometimes|in:admin,professor,user',
        ]);

        // Apenas admin pode alterar role
        if (!$request->user()->isAdmin() && isset($validated['role'])) {
            unset($validated['role']);
        }

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Usuário atualizado com sucesso',
            'user' => $user
        ]);
    }

    /**
     * Deletar usuário
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Usuário só pode deletar sua própria conta, exceto admin
        if (!$request->user()->isAdmin() && $request->user()->id != $id) {
            return response()->json([
                'message' => 'Acesso negado. Você só pode deletar sua própria conta.'
            ], 403);
        }

        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso'
        ]);
    }
}