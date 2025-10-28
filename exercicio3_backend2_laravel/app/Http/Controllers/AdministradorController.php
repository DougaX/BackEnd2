<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    // Listar todos os administradores
    public function index()
    {
        $administradores = Administrador::all();
        return view('administradores.index', compact('administradores'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('administradores.create');
    }

    // Salvar novo administrador
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:administradores,email',
            'senha' => 'required|string|min:6'
        ]);

        Administrador::create($request->all());

        return redirect()->route('administradores.index')
            ->with('success', 'Administrador criado com sucesso!');
    }

    // Mostrar um administrador específico
    public function show($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores.show', compact('administrador'));
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores.edit', compact('administrador'));
    }

    // Atualizar administrador
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:administradores,email,' . $id,
            'senha' => 'nullable|string|min:6'
        ]);

        $administrador = Administrador::findOrFail($id);
        
        // Atualiza apenas se a senha foi fornecida
        $dados = $request->only(['nome', 'email']);
        if ($request->filled('senha')) {
            $dados['senha'] = $request->senha;
        }
        
        $administrador->update($dados);

        return redirect()->route('administradores.show', $id)
            ->with('success', 'Administrador atualizado com sucesso!');
    }

    // Deletar administrador
    public function destroy($id)
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->delete();

        return redirect()->route('administradores.index')
            ->with('success', 'Administrador deletado com sucesso!');
    }
}