<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all(); // plural, porque são várias salas
        return view('salas.index', compact('salas')); // envia 'salas' para a view
    }

    public function show($id)
    {
        $sala = Sala::findOrFail($id); // singular, uma sala específica
        return view('salas.show', compact('sala')); // envia 'sala' para a view
    }
}


