<?php

use App\Http\Controllers\CursoController;

// Mostrar la lista de cursos
Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');

// Mostrar el formulario para crear un nuevo curso
Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');

// Almacenar un nuevo curso en la base de datos
Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');

// Mostrar un curso específico
Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

// Mostrar el formulario para editar un curso
Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

// Actualizar un curso específico
Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

// Eliminar un curso específico
Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

