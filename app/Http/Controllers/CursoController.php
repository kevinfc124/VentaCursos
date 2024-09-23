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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la imagen
        ]);
    
        $cursoData = $request->all();
    
        // Subir la imagen
        if ($request->hasFile('imagen')) {
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $fileName);
            $cursoData['imagen'] = $fileName; // Asignar el nombre del archivo a los datos del curso
        } else {
            $cursoData['imagen'] = null; // Asegurarse de que no sea nulo si no se sube una imagen
        }
    
        // Crear el curso con los datos
        Curso::create($cursoData);
    
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $curso = Curso::findOrFail($id);
    
        // Verifica si se subió una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($curso->imagen) {
                \File::delete(public_path('images/' . $curso->imagen));
            }
    
            // Subir la nueva imagen
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $fileName);
            $curso->imagen = $fileName; // Guardar solo el nombre de la imagen
        }
    
        // Actualizar los demás campos
        $curso->update($request->except('imagen')); // Excluir el campo imagen
    
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
