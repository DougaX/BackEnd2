<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    public function show($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.show', compact('professor'));
    }
}

