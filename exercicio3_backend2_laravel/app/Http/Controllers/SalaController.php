<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    // Listar todas as salas
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('salas.create');
    }

    // Salvar nova sala
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
            'localizacao' => 'required|string|max:255'
        ]);

        Sala::create($request->all());

        return redirect()->route('salas.index')
            ->with('success', 'Sala criada com sucesso!');
    }

    // Mostrar uma sala específica
    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.show', compact('sala'));
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.edit', compact('sala'));
    }

    // Atualizar sala
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
            'localizacao' => 'required|string|max:255'
        ]);

        $sala = Sala::findOrFail($id);
        $sala->update($request->all());

        return redirect()->route('salas.show', $id)
            ->with('success', 'Sala atualizada com sucesso!');
    }

    // Deletar sala
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();

        return redirect()->route('salas.index')
            ->with('success', 'Sala deletada com sucesso!');
    }
}