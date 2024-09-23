<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Asegúrate de importar el modelo User
        return view('usuarios.index', compact('usuarios'));
    }
}
