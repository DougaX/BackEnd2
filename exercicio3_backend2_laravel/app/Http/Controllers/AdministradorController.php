<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all(); // plural, todos os administradores
        return view('administradores.index', compact('administradores')); // envia para a view
    }

    public function show($id)
    {
        $administrador = Administrador::findOrFail($id); // singular, um administrador
        return view('administradores.show', compact('administrador')); // envia para a view
    }
}
