<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    // Mostrar un curso individual
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    // Mostrar formulario para crear un nuevo curso
    public function create()
    {
        return view('cursos.create');
    }

    // Almacenar un nuevo curso en la base de datos
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required',
            'duracion' => 'required|integer',
            'precio' => 'required|numeric',
            'modalidad' => 'required|string',
            'dias' => 'required|string',
            'horarios' => 'required|string',
        ]);

        // Crear un nuevo curso
        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
    }

    // Mostrar formulario para editar un curso existente
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    // Actualizar un curso en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required',
            'duracion' => 'required|integer',
            'precio' => 'required|numeric',
            'modalidad' => 'required|string',
            'dias' => 'required|string',
            'horarios' => 'required|string',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito.');
    }

    // Eliminar un curso de la base de datos
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito.');
    }
}
