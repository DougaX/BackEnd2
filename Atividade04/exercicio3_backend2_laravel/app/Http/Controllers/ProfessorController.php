<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // Listar todos os professores
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('professores.create');
    }

    // Salvar novo professor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email',
            'departamento' => 'required|string|max:255'
        ]);

        Professor::create($request->all());

        return redirect()->route('professores.index')
            ->with('success', 'Professor criado com sucesso!');
    }

    // Mostrar um professor específico
    public function show($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.show', compact('professor'));
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.edit', compact('professor'));
    }

    // Atualizar professor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email,' . $id,
            'departamento' => 'required|string|max:255'
        ]);

        $professor = Professor::findOrFail($id);
        $professor->update($request->all());

        return redirect()->route('professores.show', $id)
            ->with('success', 'Professor atualizado com sucesso!');
    }

    // Deletar professor
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professores.index')
            ->with('success', 'Professor deletado com sucesso!');
    }
}